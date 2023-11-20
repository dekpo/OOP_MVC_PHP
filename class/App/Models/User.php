<?php
namespace App\Models;
use App\Models\AbstractTable;

class User extends AbstractTable{

    protected ?string $name = null;
    protected ?string $email = null;
    protected ?string $password = null;
    protected ?string $roles = null;

    public function setName(?string $name){
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setEmail(?string $email){
        $this->email = $email;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPassword(?string $password){
        $this->password = $password;
        return $this;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setRoles(?string $roles){
        $this->roles = $roles;
        return $this;
    }

    public function getRoles(): string
    {
        return $this->roles;
    }

    public function toArray():array
    {
        $userArray = [
            $this->getName(),
            $this->getEmail(),
            $this->getPassword(),
            $this->getRoles()
        ];
        return $userArray;
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