<?php
namespace App\Models;

use App\Models\AbstractTable;

class Reset extends AbstractTable{

    protected ?int $user_id = null;
    protected ?string $reset_key = null;
    private ?string $created_at = null;
    private ?int $is_active = null;

    public function setUserId(?int $id){
        $this->id = $id;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setResetKey(?string $str){
        $this->reset_key = $str;
        return $this;
    }

    public function getResetKey(): string
    {
        return $this->reset_key;
    }

    public function setIsActive(int $int){
        $this->is_active = $int;
        return $this;
    }

    public function getIsActive(): int
    {
        return $this->is_active;
    }

    public function toArray():array
    {
        $resetArray = [
            $this->getUserId(),
            $this->getResetKey()
        ];
        return $resetArray;
    }

}