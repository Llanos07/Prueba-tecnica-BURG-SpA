<?php 
    class PageController{
        public function home(){
            require_once(__DIR__ . '/../Views/home.view.php');
        }
        public function create(){
            echo "create";
        }
        public function read(){
            echo "read";
        }
        public function update(){
            echo "update";
        }
        public function delete(){
            echo "delete";
        }
    }