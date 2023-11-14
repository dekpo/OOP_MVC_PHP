<?php
namespace App\Controllers;

use App\Models\Picture;

class HomeController{

    public function index(){
        $pic = new Picture();
        $data = $pic->getAll(3);
        $stagiaires = ["Diego ;)","Andréa","Sabrina"];
        $this->render('./views/template_home.phtml',[$data,$stagiaires]);
    }

    public function render($templatePath,$data){
        ob_start();
        include $templatePath;
        $template = ob_get_clean();
        include "./views/layout.phtml";
    }
}