<?php declare(strict_types=1);

namespace App\database;

use PDO;
class Setup
{
    private PDO $connectionInstance;
    
    /**
     * Setup Constructor
     * @param array $data
     */
    public function __construct(
        private array $data
    ){
        $dsn = "mysql:host=" . $data["DB_HOST"]  . ";dbname=" . $data["DB_NAME"];
        try{
            $this->connectionInstance = new PDO($dsn,$data["DB_USER"],$data["DB_PASS"]);
        }catch(\PDOException $pdoExc){
            throw $pdoExc;
        }
    }
    public function getConnectionInstance() : PDO 
    {
        return $this->connectionInstance;
    }
}