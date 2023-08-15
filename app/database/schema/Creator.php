<?php declare(strict_types=1);

namespace App\database\schema;

use App\database\migrations\migrator;

class Creator
{
    public static function create(string $name , \Closure | array | callable $callback)
    {

        $data = call_user_func_array($callback,[new Blueprint]);
        $migrator = new migrator();

        $instructions = "";

        foreach($data as $instruction)
        {
            $instructions .= $instruction . " ,";
        }


        if(substr($instructions,-1) == ","){
            $instructions = substr($instructions,0,-1);
        }

        $migrator->prepare([
            "name"=>$name,
            "query"=>"CREATE TABLE $name("
                        .
                    $instructions
                        .
                    ")"
        ]);
    }
}