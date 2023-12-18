<?php
namespace App\Controllers;

use App\Controllers\Controller;
use joshtronic\LoremIpsum;

class AdminController extends Controller{

    public function index(){
        
        $lipsum = new LoremIpsum();
        $this->render('./views/template_admin.phtml',[
            'title' => ucfirst($lipsum->words(5)),
            'parag' => $lipsum->paragraphs(1)
        ]);
    }

}