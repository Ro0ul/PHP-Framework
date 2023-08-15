<?php 

define("ROOT", __DIR__ . "/../" . "/../" . "/../");
require_once  ROOT . "vendor/autoload.php";

use App\database\schema\Blueprint;
use App\database\schema\Creator;


Creator::create("example",function(Blueprint $table){
    return [
        $table->int("Data"),
        $table->increment("id"),
        $table->primary("id"),
    ];
});