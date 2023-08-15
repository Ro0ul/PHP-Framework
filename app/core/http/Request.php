<?php declare(strict_types=1);

namespace App\core\http;

class Request 
{
    /**
     * Request getUri
     * @static
     */

    public static function getUri() : string 
    {
    return strtolower($_SERVER["REQUEST_URI"]);
    }
     /**
      * Request getMethod
      * @static
      */
    public static function getMethod() : string 
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
}