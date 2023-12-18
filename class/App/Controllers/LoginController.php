<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Services\Authenticator;
use ReCaptcha\ReCaptcha;

class LoginController extends Controller
{
    public function index()
    {
        $errors = [];
        if (isset($_POST['submit'])) {

            // Google Recaptcha challenge
            $recaptcha = new ReCaptcha(GOOGLE_RECAPTCHA_SECRET);
            $gRecaptchaResponse = $_POST['g-recaptcha-response'];
            $remoteIp = $_SERVER['REMOTE_ADDR'];
            $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
            if (!$resp->isSuccess() ) $errors[] = "Veuillez ne pas être un robot svp merci."; 
            // END Google Recaptcha challenge

            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);
            $auth = new Authenticator();
            if (empty($errors) && $auth->login($email,$password)){
                $cookieData = serialize($_SESSION['user']);

                if (isset($_POST['remember_me'])){
                setcookie(CONFIG_COOKIE_NAME,$cookieData, time()+3600*24*365 );
                }

                header("Location:?page=home"); 
            }
            $errors[] = "Problème d'authentification !";
        }
        $this->render('./views/template_login.phtml', [
            'errors' => $errors
        ]);
    }
}
