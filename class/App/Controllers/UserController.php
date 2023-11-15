<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\User;
use App\Models\UserManager;

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
                // On transforme l'objet User courant en tableau
                // Avec uniquement les valeurs des propriétés
                // Voir la methode toArray() dans User.php
                $userArray = $user->toArray();
                // On instancie un UserManager
                $userManager = new UserManager();
                // On effectue l'insert dans la table
                $insert = $userManager->insert( $userArray );
                // On est très content !
                echo "<p>C'est gang ! On a inséré l'utilisateur !</p>";
                echo "<p>Son id est {$insert->lastInsertId()}</p>";
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