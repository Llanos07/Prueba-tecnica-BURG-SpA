<?php 
    class User extends Orm{
        public function __construct(PDO $conn){
            parent::__construct('id', 'usuarios', $conn);
        }

        public function find($username){
            $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE username = :username");
            $stmt->execute(['username' => $username]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    
        public function storeToken($userId, $token){
            $stmt = $this->db->prepare("INSERT INTO tokens (user_id, token) VALUES (:userId, :token)");
            $stmt->execute(['userId' => $userId, 'token' => $token]);
        }

        public function verifyToken($token){
            $stmt = $this->db->prepare("SELECT user_id FROM tokens WHERE token = :token");
            $stmt->execute(['token' => $token]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result['user_id'] : null;
        }

        public function invalidateToken($token){
            $stmt = $this->db->prepare("DELETE FROM tokens WHERE token = :token");
            $stmt->execute(['token' => $token]);
        }
    }