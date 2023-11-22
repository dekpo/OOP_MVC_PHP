<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\PictureManager;

class SearchController extends Controller{

    public function index(){
        $pic = new PictureManager();
        $pictures = $pic->search($_GET['keywords']);
        $this->render('./views/template_search.phtml',[
            'pictures' => $pictures
        ]);
    }

}