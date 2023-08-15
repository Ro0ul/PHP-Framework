<?php declare(strict_types=1);

namespace App\core\error;

class Router extends \Exception
{
    /**
     * Router notFound
     * 
     * @param string $message
     */
    public static function notFound() : static 
    {
        return new static("Please Set a 404 function As the first Class Method");
    }
    /**
     * Router unallowedMethod
     * 
     * @param string $message
     */
    public static function unallowedMethod() : static 
    {
        return new static("Unlawful Method");
    }
}