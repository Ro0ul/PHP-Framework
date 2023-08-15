<?php declare(strict_types=1);

namespace App\models;
use App\core\config\database;
use App\database\Setup;
use PDO;


class example extends Model //Change Function Name
{
    private PDO $db;
    private const modelName = "example"; //Change Function Name
    private string $constructedInstruction = '';
    public function __construct() 
    {
        $data = new database();
        $data = $data::getConfig();
        $con = new Setup($data);
        $this->db = $con->getConnectionInstance();

    }
    public function create(array $data)
    {
        $keys = null;
        $values = null;
        $instruction = null;
        foreach($data as $key => $value)
        {
            $keys.= $key . ",";
            $values.= "'" . $value . "'" . ",";
        }
        if(substr($keys, -1) == ","){
            $keys = substr($keys,0,-1);
        }
        if(substr($values, -1) == ","){
            $values = substr($values,0,-1);
        }
        $prepared = $this->db->prepare("INSERT INTO " . self::modelName ."($keys) VALUES($values);");
        $prepared->execute();
    } 
    public function select(string | array $instruction) : self | \Exception
    {
        if(!str_contains($this->constructedInstruction,"UPDATE")){
            if(!is_array($instruction)){
                $this->constructedInstruction = "SELECT $instruction FROM " . self::modelName;
            }else{
                $something = '';

                foreach($instruction as $instructions){
                    $something .= "$instructions ,";
                }
                if(substr($something, -1) == ","){
                    $something = substr($something,0,-1);
                }
                $this->constructedInstruction = "SELECT $something FROM " . self::modelName;
            }
            return $this;
        }
        throw new \Exception("Write Error Here");
        
    }
    public function where(string $instruction) : self
    {
        $this->constructedInstruction .= "WHERE $instruction ";
        return $this;
    }
    public function limit(int $limit) : self
    {
        $this->constructedInstruction .= "LIMIT $limit ";
        return $this;
    }
    public function order(string $order) : self
    {
        $this->constructedInstruction .= "ORDER $order ";
        return $this;
    }
    public function Execute() 
    {
        $this->constructedInstruction .= ";";
        return $this->db->exec($this->constructedInstruction);
    }
    public function update(string $instruction) : self | \Exception
    {
        if(!str_contains($this->constructedInstruction,"SELECT")){
            $this->constructedInstruction = "UPDATE FROM " . self::modelName . " SET $instruction ";
            return $this;
        }
        throw new \Exception("Write Error Here");
    }
}