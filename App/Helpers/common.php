<?php 
    class Result {
        public $success;
        public $result;
        public $message;
        public $token;

        public function __construct() {
            $this->success = false;
            $this->result = [];
            $this->message = '';
            $this->token = '';
        }
    }