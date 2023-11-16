<?php
namespace App\Models;
use App\Services\Database;
class UserManager
{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAll($nb=null)
    {
        $limit = !is_null($nb) ? "LIMIT " . $nb : "";
        $pictures = [];
        $pictures = $this->db->selectAll("SELECT * from user ORDER BY id DESC ". $limit);
        return $pictures;
    }

    public function insert($data=[])
    {
        $addUser = $this->db->query("INSERT INTO user (name, email, password) VALUES (?,?,?)",$data);
        return $addUser;
    }

}