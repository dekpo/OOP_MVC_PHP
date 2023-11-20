<?php
namespace App\Models;
use App\Models\AbstractTable;

class Picture extends AbstractTable
{
    protected ?string $title = null;
    protected ?string $description = null;
    protected ?string $src = null;
    protected ?string $author = null;
    private ?string $created_at = null;
    protected ?string $updated_at = null;


    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setDescription($description){
        $this->description = $description;
        return $this;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setSrc($src){
        $this->src = $src;
        return $this;
    }

    public function getSrc(){
        return $this->src;
    }

    public function setAuthor($author){
        $this->author = $author;
        return $this;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function setCreatedAt(){
        $this->created_at = date("Y-m-d H:i:s");
        return $this;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

    public function setUpdatedAt(){
        $this->updated_at = date("Y-m-d H:i:s");
        return $this;
    }

    public function getUpdatedAt(){
        return $this->updated_at;
    }

    public function toArray(){
        $picArray = [
            $this->getTitle(),
            $this->getDescription(),
            $this->getSrc(),
            $this->getAuthor(),
            $this->getUpdatedAt()
        ];
        return $picArray;
    }

}