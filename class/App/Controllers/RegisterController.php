<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;
use App\Models\UserManager;

class RegisterController extends Controller
{

    public function index()
    {
        // On anticipe d'éventuelles erreurs en créant un tableau
        $errors = [];
        $userAdded = false;
        if (isset($_POST['name'])) {

            // On instancie la class User pour créer un nouvel utilisateur
            $user = new User();
            // Si le formulaire est validé on "hydrate" notre objet
            // avec les informations du formulaire
            $user
                ->setName($_POST['name'])
                ->setEmail($_POST['email'])
                ->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT))
                ->setRoles("[]");
            // Si la méthode validate ne retourne pas d'erreurs on fait l'insert dans la table
            $errors = $user->validate();
            if (empty($errors)) {
                // On transforme l'objet User courant en tableau
                // Avec uniquement les valeurs des propriétés
                // Voir la methode toArray() dans User.php
                $userArray = $user->toArray();
                // On instancie un UserManager
                $userManager = new UserManager();
                // On effectue l'insert dans la table
                $userManager->insert($userArray);
                // On est très content !
                $userAdded = true;
            }
        }
        $this->render('./views/template_register.phtml', [
            'errors' => $errors,
            'userAdded' => $userAdded
        ]);
    }
}
