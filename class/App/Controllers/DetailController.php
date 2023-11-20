<?php
namespace App\Controllers;
use App\Models\PictureManager;
use App\Controllers\Controller;
use App\Services\Authenticator;

class DetailController extends Controller{

    public function __construct()
    {
        if (Authenticator::isNotGranted("ROLE_MEMBER")) { 
            header("Location:?page=login");
        }
    }

    public function index(){
        $id = intval($_GET['id']);
        $pictureManager = new PictureManager();
        $picture = $pictureManager->getOneById($id);
        $this->render('./views/template_detail.phtml',[
            'picture' => $picture
        ]);
    }

}