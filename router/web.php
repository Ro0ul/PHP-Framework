<?php declare(strict_types=1);
use App\core\Router;
use App\controller\Controller;


Router::set404(function(){
    echo "Not Found"; //404 Error Here
});

Router::get("/",[Controller::class, "render"]);

