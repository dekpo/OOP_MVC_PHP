<?php
namespace App\Models;
use App\Models\AbstractTable;

class Picture extends AbstractTable
{
    private ?string $title = null;
    private ?string $description = null;
    private ?string $src = null;
    private ?string $author = null;
    private ?string $createdAt = null;
    private ?string $updatedAt = null;

    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    public function setDescription($description){
        $this->description = $description;
        return $this;
    }

    public function setSrc($src){
        $this->src = $src;
        return $this;
    }

    public function setAuthor($author){
        $this->author = $author;
        return $this;
    }

    public function setUpdatedAt(){
        $this->updatedAt = date("Y-m-d H:i:s");
        return $this;
    }

    public function toArray(){
        $picArray = [
            $this->title,
            $this->description,
            $this->src,
            $this->author,
            $this->updatedAt
        ];
        return $picArray;
    }

    
}