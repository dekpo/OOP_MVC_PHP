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
}