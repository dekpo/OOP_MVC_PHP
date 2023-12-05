<?php
namespace App\Models;

use App\Models\AbstractManager;
use App\Services\Database;
use App\Models\Category;

class CategoryManager extends AbstractManager
{

    public function __construct(){
        self::$db = new Database();
        self::$tableName = 'category';
        self::$obj = new Category();
    }
    
}