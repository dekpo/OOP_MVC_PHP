<?php
namespace App\Models;

use App\Models\Picture;
use App\Services\Database;
use App\Models\AbstractManager;

class PictureManager extends AbstractManager
{

    public function __construct(){
        self::$db = new Database();
        self::$tableName = 'picture';
        self::$obj = new Picture();
    }

}
