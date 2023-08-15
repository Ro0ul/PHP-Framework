<?php declare(strict_types=1);

namespace App\controller;
use App\models\example;
use App\models\users;

class Controller
{
    public static function render() : void 
    {
        view("index");
    }
}