<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\User;

class UserController extends Controller{

    public function index(){
        if (isset($_POST['submit'])){
            $user = new User();
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
        }
        $this->render('./views/template_user.phtml',[
            'user' => $user
        ]);
    }

}