<?php declare(strict_types=1);

namespace App\core\error;

class Cli extends \Exception
{
    /**
     * Cli notFound
     * 
     * @param string $message
     */
    public static function notFound(string $command) : static 
    {
        return new static("$command Isn't A Valid Command");
    }
}