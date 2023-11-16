<?php

namespace App\Models;

use App\Services\Database;

class PictureManager
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll($nb = null): array|false
    {
        $limit = !is_null($nb) ? "LIMIT " . $nb : "";
        $pictures = [];
        $pictures = $this->db->selectAll("SELECT * from picture ORDER BY id DESC " . $limit);
        return $pictures;
    }

    public function getOneById($id = null)
    {
        $whereId = !is_null($id) ? "WHERE id=?" : "";
        $picture = [];
        $picture = $this->db->select("SELECT * from picture " . $whereId . "LIMIT 1", [$id]);
        return $picture;
    }

    public function insert($data = [])
    {
        $addPic = $this->db->query("INSERT INTO picture (title, description, src, author) VALUES (?,?,?,?)", $data);
        return $addPic;
    }

    public function update($data = [])
    {
        $updatePic = $this->db->query("UPDATE picture SET title=?, description=?, src=?, author=?, updated_at=? WHERE id=?", $data);
        return $updatePic;
    }

    public function delete($id = null)
    {
        if (!is_null($id)) {
            $this->db->query("DELETE FROM picture WHERE id=?", [$id]);
            return true;
        }
        return false;
    }

    public function search(string $terms)
    {
        // on récupère la chaine de recherche depuis $terms
        // on la convertit en texte en enlevant les espace...
        $keywords = strtolower(strval(urldecode(trim($terms))));
        $pictures = $this->db->selectAll("SELECT * FROM picture WHERE title LIKE '%".$keywords."%' OR description LIKE '%".$keywords."%' OR src LIKE '%".$keywords."%' OR author LIKE '%".$keywords."%'",
        []);
        return $pictures;
    }
}
