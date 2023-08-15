<?php declare(strict_types=1);

namespace App\core\error;

class Database extends \Exception
{
    /**
     * Database noQueryFound
     * 
     * @param string $message
     */
    public static function noQueryFound() : static 
    {
        return new static("No Command Found In The migrations.sql File");
    }
}