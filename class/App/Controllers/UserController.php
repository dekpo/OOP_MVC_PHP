<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\User;

class UserController extends Controller{

    public function index(){
        // On instancie la class User pour créer un nouvel utilisateur
        $user = new User();
        // On anticipe d'éventuelles erreurs en créant un tableau
        $errors = [];
        if (isset($_POST['submit'])){
            // Si le formulaire est validé on "hydrate" notre objet
            // avec les informations du formulaire
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            // Si la méthode validate ne retourne pas d'erreurs on fait l'insert dans la table
            $errors = $user->validate();
            if (empty($errors)){

                echo "C'est gang ! On peut insérer l'utilisateur !";
                die();

            }
        }
        $this->render('./views/template_user.phtml',[
            '$_POST' => $_POST,
            'user' => $user,
            'errors' => $errors
        ]);
    }
}