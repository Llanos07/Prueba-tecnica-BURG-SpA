<?php 
require_once(__DIR__ .'/../Models/User.php');
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

    public function read(){
    }

    public function update(){
    }

    public function delete(){
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
        $token = bin2hex(random_bytes(16)); // Genera un token aleatorio
        $this->userModel->storeToken($user->id, $token);
        $res->success = true;
        $res->message = 'Inicio de sesión exitoso';
        $res->token = $token;
        echo json_encode($res);
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
    
        // Invalida el token de acceso
        $this->userModel->invalidateToken($token);
        $res->success = true;
        $res->message = 'Cierre de sesión exitoso';
        echo json_encode($res);
    }

}