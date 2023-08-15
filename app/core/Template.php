<?php declare(strict_types=1);

namespace App\core;

use Smarty;

class Template extends Smarty
{
    public function __construct()
    {
         parent::__construct();
 
         $this->setTemplateDir(ROOT . "views/");
        //  $this->setCompileDir('Costum Compiler Here');
        //  $this->setConfigDir('Costum Configuration Here');
        //  $this->setCacheDir(ROOT . "tmp/cache/Smarty");
        //  $this->caching = ; //You Can Set The Caching Here
    }

}