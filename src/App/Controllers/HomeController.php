<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\PictureManager;

class HomeController extends Controller{

    public function index(){
        $pic = new PictureManager();
        $pictures = $pic->getAll(3);
        $this->render('./views/template_home.phtml',[
            'pictures' => $pictures
        ]);
    }

}