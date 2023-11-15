<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\Picture;

class GalleryController extends Controller{


    public function index(){
        $pic = new Picture();
        $data = $pic->getAll(3);
        $this->render('./views/template_home.phtml',[$data]);
    }

}