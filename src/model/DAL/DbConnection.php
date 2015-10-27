<?php

namespace bildflode\model\DAL;

class DbConnection
{
    /**
     * @var PDO Connection
     */
    private $connection;

    /**
     * Creates a PDO conenction to the database and saves it as a
     * private variable.
     */
    public function __construct(){
        try{
            $this->connection = new \PDO('mysql:host=' . \Settings::DSN . ';dbname=' . \Settings::DATABASE . ';',
			 			\Settings::DB_USERNAME,
						\Settings::DB_PASSWORD);
            $this->connection->SetAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch(\Exception $e){
            throw $e;
        }
    }

    /**
     * Returns the PDO connection.
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }
}
