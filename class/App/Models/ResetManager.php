<?php
namespace App\Models;

use App\Models\AbstractManager;
use App\Services\Database;
use App\Models\Reset;

class ResetManager extends AbstractManager
{

    public function __construct(){
        self::$db = new Database();
        self::$tableName = 'reset';
        self::$obj = new Reset();
    }
    
    public function getOneByUserKey($user_id = null,$key = null): array|bool
    {
        $where = !is_null($user_id) ? "WHERE user_id=? AND reset_key=? AND is_active=1" : "";
        $row = [];
        $row = self::$db->select("SELECT * from ".self::$tableName." " . $where . " LIMIT 1", [$user_id, $key]);
        return $row;
    }
}