<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\PictureManager;
use Firebase\JWT\JWT;

use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\Key;

class ApiController extends Controller
{

    public function index(){
        $pic = new PictureManager();
        $pictures = $pic->getAll(4);
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($pictures);
    }

    public function add(){
       echo json_encode($_POST);
    }

    public function login(){
        $secret_key = "laclesecretedukgbciafbiettoutletoutime";
        $user_id = 6; // This must be the user id retrieved by a query

        $issued_at = time();
        $expiration_time = $issued_at + (10 * 60); // valid for 10 minutes

    $payload = array(
        'iat' => $issued_at,
        'exp' => $expiration_time,
        'sub' => $user_id
    );

    echo JWT::encode($payload, $secret_key, 'HS256');
    }

    public function auth(){
        $jwt_token = $_POST['jwt'];
        $secret_key = "laclesecretedukgbciafbiettoutletoutime";
        try {
            return JWT::decode($jwt_token, new Key($secret_key, 'HS256'));
        } catch (ExpiredException $e) {
            throw new \Exception('Token expired');
        } catch (SignatureInvalidException $e) {
            throw new \Exception('Invalid token signature');
        } catch (BeforeValidException $e) {
            throw new \Exception('Token not valid yet');
        } catch (\Exception $e) {
            throw new \Exception('Invalid token');
        }
        echo "You're authenticated !";
    }

}
