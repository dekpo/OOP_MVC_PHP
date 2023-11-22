<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Services\Authenticator;


class LogoutController extends Controller{

    public function index(){
       $auth = new Authenticator();
       $auth->logout();
       header("Location:?page=home");
    }

}