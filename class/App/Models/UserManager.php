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


}