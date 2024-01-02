<?php
namespace App\Services;

use App\Models\UserManager;

class Authenticator
{
    public function __construct()
    {
        if (!isset($_SESSION)) session_start();
        if (isset($_COOKIE[CONFIG_COOKIE_NAME]) && !empty($_COOKIE[CONFIG_COOKIE_NAME])){
            $user = unserialize($_COOKIE[CONFIG_COOKIE_NAME]);
            $this->setSessionData($user);
        }
        if (isset($_POST['cookie_yes'])) $_SESSION['cookie'] = true;
        if (isset($_POST['cookie_no'])) $_SESSION['cookie'] = false;
    }

    public static function isNotGranted(string $role): bool
    {
        $check = (!isset($_SESSION['user']) || !in_array($role,json_decode($_SESSION['user']['roles'])));
        return $check; 
    }

    public function setSessionData(array $userData): void
    {
        $_SESSION['user'] = $userData;
    }

    public function login(string $email,string $password): bool
    {
        $verif = false;
        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);
        if ($user) {
            $verif = password_verify($password,$user['password']);
        }
        if ($verif){
            // just remove password
            unset($user['password']);
            // for not storing password in session & cookie
            $this->setSessionData($user);
        }
        return $verif;
    }

    public function loginApi(string $email,string $password): array
    {
        $verif = false;
        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);
        if ($user) {
            $verif = password_verify($password,$user['password']);
        }
        if ($verif){
            // just remove password
            unset($user['password']);
        }
        return ['isAuth' => $verif,'user' => $user];
    }

    public function logout(): void
    {
        // session_destroy(); // Un peu trop violent car on perd aussi le choix des cookies
        // Donc faire un unset des infos $_SESSION['user'] est plus adapté
        unset($_SESSION['user']);
        // on en profite pour "vider" le cookie s'il existe
        // en mettant sa date d'expiration à une seconde de moins que "maintenant"
        if(isset($_COOKIE[CONFIG_COOKIE_NAME])){
            setcookie(CONFIG_COOKIE_NAME,"", time()-1 );
        }
    }

}