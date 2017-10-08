<?php
namespace ProgramData\Database;

/**
 * Real Connection Class to MySQL
 */
class MySQL
{
    /** @var Array $config Configuration - private to class */
    private $config;
    /** @var  PDO $connection Connection via PDO */
    protected $connection;

    /**
     * MySQL constructor and build up configuration
     */
    public function __construct()
    {
        $this->getConfig();
        return $this;
    }

    /**
     * Create Connection and return;
     * @return bool|\PDO|PDO
     */
    public function connect()
    {
        try {
            $this->connection = new \PDO(
                'mysql:dbname=' . $this->config['database'] . ';' .
                'host=' . $this->config['host'] . ';' .
                'port=' . $this->config['port'],
                $this->config['username'],
                $this->config['password']
            );
            return $this->connection;
        } catch (\PDOException $exception) {
            var_dump($exception->getMessage()); exit;
            return false;
        }
    }

    /**
     * Get MySQL Connection details from configFile
     * You do not hold those details here ( security risk )
     * @return bool
     */
    private function getConfig()
    {
        $configFile = __DIR__ .
            DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . 'config' .
            DIRECTORY_SEPARATOR . 'mysql.php';

        // load file and populate $this->config;
        if (file_exists($configFile)){
            $this->config = include $configFile;
            return true;
        }

        return false;
    }
}