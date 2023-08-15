<?php declare(strict_types=1);

namespace App\core\config;

use Dotenv\Dotenv;
class database extends config 
{
    /**
     * @return array
     */
    public static function getConfig(?string $envLocation = null) : array
    {
        $dotenv = Dotenv::createImmutable($envLocation ?? parent::ROOT_DIRECTORY);
        $dotenv->load();
        return [
            "DB_NAME"=>$_ENV["DB_NAME"],
            "DB_PASS"=>$_ENV["DB_PASS"],
            "DB_PORT"=>$_ENV["DB_PORT"],
            "DB_USER"=>$_ENV["DB_USER"],
            "DB_HOST"=>$_ENV["DB_HOST"],
            "DB_DRIVER"=>$_ENV["DB_DRIVER"] ?? "mysqli"
        ];
    } 
}