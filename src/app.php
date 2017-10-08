<?php
use ProgramData\Validator\ProductValidator;

require_once (__DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php');

// Change MySQLMock() to MySQL() to connect and check details in .env are correct.
$mySQL = (new ProgramData\Database\MySQLMock())->connect();

/* Products Table would be setup as below
 |------------------------------------------------------
 | Column      | Type          | Null | Notes
 |------------------------------------------------------
 | Id          | int(11)       | No   | auto_increment
 | Name        | var_char(255) | No   |
 | Description | text          | Yes  |
 | Price       | float(2,0)    | No   | Default 0.00
 |------------------------------------------------------
*/
$mockData = [
    'Name'        => 'Product Name',
    'Description' => '',
    'Price'       => '3.00' // Delibrate string as it would come from website.
];

// Validate Data before going any futher;
$validation = new ProductValidator();

// return Validation Errors if validation doesn't pass.
if (! $validation->validate($mockData)) {
    echo 'Validation Failed';
    exit;
}

// Prepare MySQL Statement for entering into Database.
$mysqlStatement = $mySQL->prepare('INSERT INTO product(Name, Description, Price) VALUES(:Name, :Description, :Price)');

// Bind Each paramater
$mysqlStatement->bindParam('Name', $mockData['Name']);
$mysqlStatement->bindParam('Description', $mockData['Description']);
$mysqlStatement->bindParam('Price', $mockData['Price']);

// Execute the connection
try {
    if (! $mysqlStatement->execute()) {
        throw new PDOException('Not Inserted');
    };
    $mysqlStatement->closeCursor();
    echo 'Data Entered';
    exit;
} catch (\PDOException $exception) {
    echo 'Data failed to insert: ' . $exception->getMessage();
    exit;
}

