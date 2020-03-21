<?php

class Post extends CI_Controller{
    public function index(){
        header('Access-Control-Allow-Origin: *'); //CORS. Allow access from all domains

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $username = $this->input->post('username');

        //Check if username exists, here

        $data = array(
            'email' => $email,
            'password' => $password,
            'username' => $username
        );

        if($email != NULL && $password != NULL && $username != NULL){
            $this->load->database();
            $this->db->insert('users', $data);
            echo "success";
        }
        else{
            echo "failed. Server error";
        }

    }
}