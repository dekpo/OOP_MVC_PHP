<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\PictureManager;
use App\Services\Authenticator;
use App\Services\JwtHandler;

class ApiController extends Controller
{

    public function index()
    {
        $pic = new PictureManager();
        $pictures = $pic->getAll(4);
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($pictures);
    }

    public function add()
    {
        echo json_encode($_POST);
    }

    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $userJwt = false;
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);
            $auth = new Authenticator();
            $authUser = $auth->loginApi($email, $password);
            if ($authUser['isAuth']) {
                $jwt = new JwtHandler();
                $userJwt = $jwt->encode($authUser['user']);
            }
            echo json_encode(['token' => $userJwt]);
        }
    }

    public function auth()
    {
        $jwt = new JwtHandler();
        echo $jwt->decodeFromHeaders();
    }
}
