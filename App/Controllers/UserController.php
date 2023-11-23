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

        $this->userModel->insert([
            'username' => $body['username'],
            'password'=> $body['password'],
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

}