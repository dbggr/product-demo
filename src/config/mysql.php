<?php
    /*
     | Create Database Credentials for connecting
    */
    return [
        'host' => getenv('MYSQL_HOST') ? : 'localhost',
        'port' => getenv('MYSQL_PORT') ? : '3306',
        'database' => getenv('MYSQL_DATABASE' ? : null),
        'username' => getenv('MYSQL_USERNAME' ? : null),
        'password' => getenv('MYSQL_PASSWORD' ? : null)
    ];
