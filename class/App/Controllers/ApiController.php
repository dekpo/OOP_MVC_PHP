<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\PictureManager;

class ApiController extends Controller
{

    public function index(){
        $pic = new PictureManager();
        $pictures = $pic->getAll(4);
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($pictures);
    }

    public function add(){
       echo json_encode($_POST);
    }



}
