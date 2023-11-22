<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\PictureManager;

class GalleryController extends Controller{


    public function index(){
        $pic = new PictureManager();
        $pictures = $pic->getAll();
        $this->render('./views/template_gallery.phtml',[
            'pictures' => $pictures
        ]);
    }

}