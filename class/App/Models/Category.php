<?php
namespace App\Models;

use App\Models\AbstractTable;

class Category extends AbstractTable{

    protected ?string $name = null;
    protected ?string $slug = null;
    private ?string $created_at = null;

    public function setName(?string $name){
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSlug(?string $str){
        $this->slug = $str;
        return $this;
    }

    public function getSlug(){
        return $this->slug;
    }

    public function toArray():array
    {
        $catArray = [
            $this->getName(),
            $this->getSlug()
        ];
        return $catArray;
    }

    public function validate() : array
    {
        /**
         * Pléthore de vérifications dans tous les sens ou pas
         */
        $errors = [];
        // Si le nom est inférieur à 3 caractères => error
        if (strlen($this->getName()) < 3){
            $errors[] = "Le champs nom est obligatoire, merci.";
        }
        return $errors;
    }

}