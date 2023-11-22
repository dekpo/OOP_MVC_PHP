<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\PictureManager;
use joshtronic\LoremIpsum;

class HomeController extends Controller{

    public function index(){
        $pic = new PictureManager();
        $pictures = $pic->getAll(3);
        $lipsum = new LoremIpsum();
        $this->render('./views/template_home.phtml',[
            'pictures' => $pictures,
            'title' => $lipsum->words(5),
            'parag' => $lipsum->paragraphs(5)
        ]);
    }

}