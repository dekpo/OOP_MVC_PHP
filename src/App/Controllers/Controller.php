<?php
namespace App\Controllers;

class Controller{

    protected function render($templatePath,$data){
        ob_start();
        include $templatePath;
        $template = ob_get_clean();
        include "./views/layout.phtml";
    }
}