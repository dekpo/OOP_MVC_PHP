<?php
namespace App\Services;

use PDO;
use PDOException;
require_once "./config.php";

class Database
{

    // propriétés de notre class
    private $db_host;
    private $db_name;
    private $db_port;
    private $db_user;
    private $db_pass;

    // propriété du DSN
    private $db_dsn;

    // PDO qu'on connait bien les amis ;)
    private $pdo;

    public function __construct(
        $db_host = DB_HOST,
        $db_port = DB_PORT,
        $db_name = DB_NAME,
        $db_user = DB_USER,
        $db_pass = DB_PASS
    ) {
        $this->db_host = $db_host;
        $this->db_port = $db_port;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_dsn = 'mysql:host=' . $this->db_host . ';port=' . $this->db_port . ';dbname=' . $this->db_name . ';charset=utf8';
    }

    private function getPDO()
    {
        if ($this->pdo === null) {
            try {
                $db = new PDO($this->db_dsn, $this->db_user, $this->db_pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                print_r("Oups PDO l'est pas content: " . iconv('ISO-8859-1','UTF-8',$e->getMessage()));
                die();
            }
            $this->pdo = $db;
        }
        // TOUT EST OK POUR AVOIR NOTRE OBJET PDO !
        // PDO EST APPELE UNE SEULE FOIS
        return $this->pdo;
    }

    public function selectAll($statement,$params=[]){
        $stmt = $this->getPDO()->prepare($statement);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function select($statement,$params=[]){
        $stmt = $this->getPDO()->prepare($statement);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function query($statement,$params=[]){
        $stmt = $this->getPDO()->prepare($statement);
        $stmt->execute($params);
        return $this->getPDO();
    }
}