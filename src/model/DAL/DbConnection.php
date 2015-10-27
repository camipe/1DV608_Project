<?php

namespace bildflode\model\DAL;

class DbConnection
{
    private $connection;

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

    public function getConnection()
    {
        return $this->connection;
    }
}
