<?php 
use App\core\Template;

function view(string $filename, string | array $data = [], mixed $value = null) : void 
{
    $template = new Template;
    $template->clearAllCache();
    if(!$value){
        $template->assign($data);
    }else{
        $template->assign($data, $value);
    }
    $template->display($filename  . ".tpl");
}