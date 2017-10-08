<?php
namespace ProgramData\Database;

/**
 * This class only Mocks a PDO for the sake of a demo
 */
class MySQLMock
{
    /**
     * MySQLMock constructor.
     * Please see MySQL.php for correct way to connec to database;
     */
    public function __construct()
    {
        return $this;
    }

    /**
     * Prepare Connection with PDO;
     * @return $this
     */
    public function connect()
    {
        return $this;
    }

    /**
     * Prepare Mock MySQL only returns $this to continue with mock;
     * @param $query
     * @return $this
     */
    public function prepare($query)
    {
        return $this;
    }

    /**
     * Mocks binds a paramater to the prepared statement above
     * @param string $columnName
     * @param $value
     * @param null $dataType
     */
    public function bindParam(string $columnName, $value, $dataType = null)
    {}

    /**
     * Mocks execute for MySQL
     */
    public function execute()
    {
        return true;
    }


    /**
     * Mocks closing of Cursor for MySQL
     */
    public function closeCursor()
    {}
}
