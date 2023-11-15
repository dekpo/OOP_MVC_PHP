<?php
namespace App\Models;
use App\Services\Database;
class UserManager
{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function insert($data=[])
    {
        $addUser = $this->db->query("INSERT INTO user (name, email, password) VALUES (?,?,?)",$data);
        return $addUser;
    }

}