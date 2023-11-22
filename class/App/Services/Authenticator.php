<?php
namespace App\Services;
use App\Models\UserManager;

class Authenticator
{
    public function __construct()
    {
        if (!isset($_SESSION)) session_start();
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
            $this->setSessionData($user);
        }
        return $verif;
    }

    public function logout(): void
    {
        session_destroy();
    }

}