<?php
namespace App\Models;
/**
 * Abstract Class Table
 * @package App\Models\AbstractTable
 */
abstract class AbstractTable
{
    protected ?int $id = null;

    public function __construct(?int $id = null)
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
}