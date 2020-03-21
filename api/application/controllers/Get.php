<?php

class Get extends CI_Controller{
    public function index(){
        //CORS. Allow access from all domains and stuff
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Authorization");

    }
    public function login(){
        
        if(isset($_POST["email"])){
            $this->load->database();
            $this->load->model('Database_model', 'dbmodel');

            $email = $_POST["email"];
            $password = $_POST["password"];

            //Check if user exists with the dbmodel
        }
    }
}