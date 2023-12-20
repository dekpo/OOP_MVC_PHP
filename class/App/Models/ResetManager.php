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
    
}