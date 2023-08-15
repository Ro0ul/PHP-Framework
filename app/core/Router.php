<?php declare(strict_types=1);

namespace App\core;
use App\core\http\Request;
use Closure;
use RouterEnum;

class Router 
{
    private static mixed $callback = null;
    public static function get(string $uri, callable | Closure | array $callback) : void 
    {
        static::run($uri,"get",$callback);
    }
    public static function set404(callable | Closure | array $callback) : void 
    {
        static::$callback = $callback;
    }
    /**
     * Router run
     * @param string $uri
     * @param string $method
     * @param Closure | callable | array $callback
     */
    private static function run(string $uri,string $method ,callable | Closure | array $callback) : void 
    {
        $requestUri = parse_url(Request::getUri())["path"];
        $requestMethod = Request::getMethod();
        $routeUri = parse_url($uri)["path"];

        if($requestMethod == $method){
            if($requestUri == $routeUri){
                call_user_func_array($callback, []);
                exit;
            }
            if(is_callable(static::$callback)){
                call_user_func_array(static::$callback,[]);
                exit;
            }
            throw \App\core\error\Router::notFound();
        }
    }
}