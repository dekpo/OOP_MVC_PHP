<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Reset;
use App\Models\ResetManager;
use App\Models\User;
use App\Models\UserManager;
use App\Utils\StringTools;
use ReCaptcha\ReCaptcha;

class ResetpassController extends Controller
{

    public function index()
    {
        // On anticipe d'éventuelles erreurs en créant un tableau
        $errors = [];
        // On peut définir une clé $key vide au départ
        $key = "";
        $user_id = null;
        $emailFetch = false;
        if (isset($_POST['email'])) {

            // Google Recaptcha challenge
            $recaptcha = new ReCaptcha(GOOGLE_RECAPTCHA_SECRET);
            $gRecaptchaResponse = $_POST['g-recaptcha-response'];
            $remoteIp = $_SERVER['REMOTE_ADDR'];
            $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
            if (!$resp->isSuccess() ) $errors[] = ["Veuillez ne pas être un robot svp merci."]; 
            // END Google Recaptcha challenge

            $userManager = new UserManager();
            // On effectue la vérification de l'email
            $verifUser = $userManager->getUserByEmail($_POST['email']);

            if (!$verifUser) { 
                $errors[] = ["Utilisateur inconnu au bataillon !"];
            }
            
            if (empty($errors)) {
                $key = StringTools::get24CharsRandly();
                $user_id = $verifUser['id'];
                $reset = new Reset();
                $reset
                ->setUserId($user_id)
                ->setResetKey($key);
                $manager = new ResetManager();
                $manager->insert($reset->toArray());
                $emailFetch = true;
            }
        }
        $this->render('./views/template_resetpass.phtml', [
            'errors' => $errors,
            'emailFetch' => $emailFetch,
            'key' => $key,
            'user_id' => $user_id
        ]);
    }

    public function reset(){
        $user_id = intval($_GET['user_id']);
        $key = $_GET['key'];

        $errors = [];
        $isKeyValidated = false;
        $isPasswordUpdated = false;

        $this->render('./views/template_reset_new_password.phtml', [
            'errors' => $errors,
            'isKeyValidated' => $isKeyValidated,
            'isPasswordUpdated' => $isPasswordUpdated
        ]); 
    }
}
