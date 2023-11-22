<?php
namespace App\Controllers;
use App\Controllers\Controller;

class NotFoundController extends Controller{

    public function index(){
        $this->render('./views/template_404.phtml',[
            'message' => "404 NOT FOUND"
        ]);
    }

}