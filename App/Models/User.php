<?php 
    class User extends Orm{
        public function __construct(PDO $conn){
            parent::__construct('id', 'usuarios', $conn);
        }
    }