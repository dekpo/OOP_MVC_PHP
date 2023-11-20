<?php
namespace App\Models;
/**
 * Abstract Class Table
 * @package App\Models\AbstractTable
 */
abstract class AbstractTable
{
    protected ?int $id = null;
    protected ?string $className = null;

    public function __construct(?int $id = null)
    {
        $this->id = $id;
        $this->setClassName($this);
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
    /**
     * @param object $obj
     */
    public function setClassName(?object $obj): void
    {
        $this->className = get_class($obj);
    }

    /**
     * @return string
     */
    public function getClassName(): ?string
    {
        return $this->className;
    }


     /**
     * @return array
     */
    public function getVars(): ?array
    {
        $vars = [];
        $filter = ['id','className'];
        $class = get_class_vars($this->getClassName());
        foreach($class as $k => $v){
           if (!in_array($k,$filter)) $vars[] = $k;
        }
        return $vars;
    }

}