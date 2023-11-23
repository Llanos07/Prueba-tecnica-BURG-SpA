<?php 
    class PageController extends Controller{
        public function __construct(PDO $conn){

        }
        public function home(){
            $this->render('home', [], 'site');
        }
        public function create(){
            $this->render('create', [], 'site');
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
        public function list(){
            $this->render('list', [], 'site');
        }
    }