<?php
namespace App\Models;
use App\Models\AbstractTable;
use DateTime;

class Picture extends AbstractTable
{
    private ?string $title = null;
    private ?string $description = null;
    private ?string $src = null;
    private ?string $author = null;
    private ?DateTime $createdAt = null;
    private ?DateTime $updatedAt = null;

    
}