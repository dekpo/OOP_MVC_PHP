<?php

namespace App\Models;

abstract class AbstractManager
{
    protected static $db;
    protected static $tableName;
    protected static $obj;

    public function __construct()
    {
    }

    public function getAll($nb = null): array|false
    {
        $limit = !is_null($nb) ? "LIMIT " . $nb : "";
        $results = [];
        $results = self::$db->selectAll("SELECT * from ".self::$tableName." ORDER BY id DESC " . $limit);
        return $results;
    }

    public function getOneById($id = null):array
    {
        $whereId = !is_null($id) ? "WHERE id=?" : "";
        $row = [];
        $row = self::$db->select("SELECT * from ".self::$tableName." " . $whereId . "LIMIT 1", [$id]);
        return $row;
    }

    public function insert($data = [])
    {
        $fields = self::$obj->getVars();
        foreach($fields as $v){ $values[] = "?"; }
        $add = self::$db->query("INSERT INTO ".self::$tableName." (".implode(",",$fields).") VALUES (".implode(",",$values).")", $data);
        return $add;
    }

    public function update($data = [])
    {
        $fields = self::$obj->getVars();
        foreach($fields as $k => $v){ $values[] = $v."=?"; }  
        $update = self::$db->query("UPDATE ".self::$tableName." SET ".implode(",",$values)." WHERE id=?", $data);
        return $update;
    }

    public function delete($id = null)
    {
        if (!is_null($id)) {
            self::$db->query("DELETE FROM ".self::$tableName." WHERE id=?", [$id]);
            return true;
        }
        return false;
    }

    public function search(string $terms)
    {
        // on récupère la chaine de recherche depuis $terms
        // on la convertit en texte en enlevant les espace avant/après...
        $keywords = strtolower(strval(urldecode(trim($terms))));
        $fields = self::$obj->getVars();
        foreach($fields as $k => $v){ $values[] = $v." LIKE '%".$keywords."%'"; }  
        $results = self::$db->selectAll("SELECT * FROM ".self::$tableName." WHERE ".implode(" OR ",$values),
        []);
        return $results;
    }
}
