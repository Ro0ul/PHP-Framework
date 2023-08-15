<?php declare(strict_types=1);

namespace App\database\schema;

class Blueprint 
{
    public function string(string $name) : string
    {
        return "$name TEXT";
    }

    public function smallText(string $name) : string
    {
        return "$name varchar(255)";
    }
    public function longText(string $name) : string
    {
        return "$name LONGTEXT";
    }
    public function increment(string $name) : string 
    {
        return "$name INT AUTO_INCREMENT";
    }
    public function int(string $name) : string 
    {
        return "$name INT";
    }
    public function primary(string $name) : string 
    {
        return "PRIMARY KEY($name)";
    }
}