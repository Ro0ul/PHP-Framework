<?php 

define("ROOT", __DIR__ . "/../" . "/../");
require_once  ROOT . "vendor/autoload.php";

use App\database\migrations\migrator;

$migrator = new migrator;

$migrator->migrate();