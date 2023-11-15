<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\User;

class UserController extends Controller{

    public function index(){
        $this->render('./views/template_user.phtml',[]);
    }

}