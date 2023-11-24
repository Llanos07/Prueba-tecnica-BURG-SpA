<?php 
    class PageController extends Controller{
        public function __construct(PDO $conn){

        }
        public function home(){
            $this->render('home', [], 'site');
        }
        public function create(){
            $this->render('create', [], 'plain');
        }
        public function profile(){
            $this->render('profile', [], 'site');
        }
        public function login(){
            $this->render('login', [], 'plain');
        }
    }