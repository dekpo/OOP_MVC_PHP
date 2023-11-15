<?php
namespace App\Models;
use App\Models\AbstractTable;

class User extends AbstractTable{

    private ?string $name = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?array $roles = [];

    public function setName(?string $name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setEmail(?string $email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPassword(?string $password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setRoles(?array $roles){
        $this->roles = $roles;
    }

    public function getRoles(){
        return $this->roles;
    }

    public function validate() : array
    {
        $errors = [];
        /**
         * Pléthore de vérifications dans tous les sens
         */
        // Si le nom est inférieur à 3 caractères => error
        if (strlen($this->name) < 3){
            $errors[] = "Le champs nom est obligatoire, merci.";
        }
        // Si l'email n'est pas bien formé => error
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Veuillez renseigner un email valide s'il vous plait.";
        }
        // Si le mot de passe est inférieur à 3 caractères => error
        if (strlen($this->password) < 3){
            $errors[] = "Le mot-de-passe doit être au moins de 3 caractères, merci.";
        }
        return $errors;
    }
}