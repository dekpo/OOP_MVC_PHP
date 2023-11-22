<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Services\Authenticator;

class LoginController extends Controller
{
    public function index()
    {
        $errors = [];
        if (isset($_POST['submit'])) {
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);
            $auth = new Authenticator();
            if ($auth->login($email,$password)){
                header("Location:?page=home"); 
            }
            $errors[] = "Problème d'authentification !";
        }
        $this->render('./views/template_login.phtml', [
            'errors' => $errors
        ]);
    }
}
