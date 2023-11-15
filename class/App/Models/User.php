<?php
namespace App\Models;
use App\Models\Table;

class User extends Table{

    private ?string $name = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?array $roles = [];

    
}