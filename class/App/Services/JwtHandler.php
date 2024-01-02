<?php
namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\Key;
require_once "./config.php";

class JwtHandler
{
    const VALIDITY_TIME = 3600; // one hour
    protected ?int $issuedAt = null;
    protected ?int $expire = null;
    protected ?string $secretKey = null;

    public function __construct()
    {
        $this->setIssuedAt();
        $this->setExpire();
        $this->setSecretKey();
    }

    public function decodeFromHeaders()
    {
        $jwtData = "{}";
        $headers = getallheaders();
        if (array_key_exists('Authorization', $headers)) {
            $token = str_replace('Bearer ', '', $headers['Authorization']);
            $decode = $this->decode($token);
            $array = (array)$decode;
            if (isset($array['user_id'])) {
                $jwtData = json_encode($decode);
            }
        }
        return $jwtData;
    }

    public function encode(array $userData)
    {
        $server = $_SERVER['SERVER_NAME'];
        $payload = [
            'iss'   => $server,
            'iat'   => $this->getIssuedAt(),
            'exp'   => $this->getExpire(),
            'sub'   => "Auth User @$server",

        ];
        // Pour ajouter des champs au payload du type user_id = 2
        foreach($userData as $k => $v){
           $payload['user_'.$k] = $v;
        }
        // Pour traiter les roles qui sont stockés de façon spéciale dans la bdd
        $roles = explode(",",str_replace(["[","]","\""],["","",""],$userData['roles']));
        // On en fait un objet json bien formaté
        // du type {"ROLE_ADMIN":"ROLE_ADMIN","ROLE_EDITOR":"ROLE_EDITOR","ROLE_MEMBER":"ROLE_MEMBER"}
        $user_roles = "{";
        foreach($roles as $role){
            $user_roles .= '"'.$role.'":"'.$role.'"';
            if ($role != end($roles)) $user_roles .=",";
        }
        $user_roles .= "}";
        // On ajoute les roles au payload sous la forme d'un objet bien propre
        $payload['user_roles'] = json_decode($user_roles);
        // On retourne le JWT
        return JWT::encode($payload, $this->getSecretKey(), 'HS256');
    }

    public function decode($token)
    {
        try{
            $decoded = JWT::decode($token, new Key($this->getSecretKey(), 'HS256'));
            return $decoded;
        } catch (\Exception $e){
            return $e->getMessage();
        }  
    }

    private function setIssuedAt(){
        $this->issuedAt = time();
    }

    private function getIssuedAt(){
        return $this->issuedAt;
    }

    private function setExpire(){
        $this->expire = $this->getIssuedAt() + self::VALIDITY_TIME;
    }

    private function getExpire(){
        return $this->expire;
    }

    private function setSecretKey(){
        $this->secretKey = CONFIG_JWT_SECRET_KEY;
    }

    private function getSecretKey(){
        return $this->secretKey;
    }
}