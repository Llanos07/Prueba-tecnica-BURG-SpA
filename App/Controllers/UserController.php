<?php 
require_once(__DIR__ .'/../Models/User.php');
session_start();
class UserController extends Controller{
    private $userModel;
    public function __construct(PDO $conn){
        $this->userModel = new User($conn);
    }


    public function list(){
        $this->render('list', [], 'site');
        $res = new Result();
        $users = $this->userModel->paginate(1, 20);

        $res->success = true;
        $res->result = $users;
        $res->message = '';
        
        json_encode($res);
    }

    public function create(){
        $res = new Result();
        $postData = file_get_contents('php://input');
        $body = json_decode($postData, true);

        if ($body === null || !isset($body['username']) || !isset($body['password']) || !isset($body['type'])) {
            print_r($body);
            $res->success = false;
            $res->message = 'Datos invalidos';
            echo json_encode($res);
            return;
        }

        $existUser = $this->userModel->find($body['username']);
        if ($existUser) {
            $res->success = false;
            $res->message = 'El usuario ya existe';
            echo json_encode($res);
            return;
        }

        $encryptPass = password_hash($body['password'], PASSWORD_DEFAULT);

        $this->userModel->insert([
            'username' => $body['username'],
            'password'=> $encryptPass,
            'type'=> $body['type']
        ]);

        $res->success = true;
        $res->message = 'Registro exitoso';
        echo json_encode($res);
    }

    public function login(){
        $res = new Result();
        $postData = file_get_contents('php://input');
        $credentials = json_decode($postData, true);
    
        if ($credentials === null || !isset($credentials['username']) || !isset($credentials['password'])) {
            $res->success = false;
            $res->message = 'Credenciales inválidas';
            echo json_encode($res);
            return;
        }

        $user = $this->userModel->find($credentials['username']);
        if (!$user || !password_verify($credentials['password'], $user->password)) {
            $res->success = false;
            $res->message = 'Credenciales incorrectas';
            echo json_encode($res);
            return;
        }
    
        // token de acceso para usuarios logueados
        $token = bin2hex(random_bytes(16));
        $this->userModel->storeToken($user->id, $token);
        $_SESSION['token'] = $token;
        $res->success = true;
        $res->message = 'Inicio de sesión exitoso';
        $res->token = $token;
        echo json_encode($res);
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
        $_SESSION['user'] = $user;
        $_SESSION['loggedin'] = true;
    }

    public function logout(){
        $res = new Result();
        $postData = file_get_contents('php://input');
        $data = json_decode($postData, true);
    
        if ($data === null || !isset($data['token'])) {
            $res->success = false;
            $res->message = 'Datos invalidos';
            echo json_encode($res);
            return;
        }
    
        $token = $data['token'];
        $userId = $this->userModel->verifyToken($token);
        if (!$userId) {
            $res->success = false;
            $res->message = 'Token invalido';
            echo json_encode($res);
            return;
        }
    
        // Elimina el token de acceso
        $this->userModel->deleteToken($token);
        $res->success = true;
        $res->message = 'Cierre de sesión exitoso';
        $_SESSION['loggedin'] = false;
        echo json_encode($res);
    }

    public function checkLoginStatus() {
        $res = new Result();
    
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            $res->success = true;
            $res->loggedin = true;
            $res->message = 'El usuario está logueado';
        } else {
            $res->success = true;
            $res->loggedin = false;
            $res->message = 'El usuario no está logueado';
        }
    
        echo json_encode($res);
    }

}