<?php declare(strict_types=1);

namespace App\models;
use App\database\Setup;

abstract class Model 
{
    private  Setup $db;
    private  string $constructedInstruction;
    abstract public  function create(array $data); 
    abstract public  function select(string $instruction) : self | \Exception;
    abstract public  function where(string $instruction) : self;
    abstract public  function limit(int $limit) : self;
    abstract public  function order(string $order) : self;
    abstract public  function update(string $instruction) : self | \Exception;
    abstract public  function Execute();
}