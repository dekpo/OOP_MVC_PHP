<?php
namespace App\Models;

use App\Models\AbstractManager;
use App\Services\Database;
use App\Models\User;

class UserManager extends AbstractManager
{

    public function __construct(){
        self::$db = new Database();
        self::$tableName = 'user';
        self::$obj = new User();
    }

    public function getUserByEmail($email = null): array|false
    {
        $whereEmail = !is_null($email) ? "WHERE email=?" : "";
        $row = [];
        $row = self::$db->select("SELECT * FROM ".self::$tableName." " . $whereEmail. "LIMIT 1", [$email]);
        return $row;
    }


}