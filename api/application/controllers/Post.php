<?php

class Post extends CI_Controller{
    public function index(){
        //CORS. Allow access from all domains and stuff
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Authorization");

        if(isset($_POST["email"])){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $username = $this->input->post('username');

            //Check if username and email exist, here
            $this->load->model('Database_model','dbmodel');
            if($this->dbmodel->userExists($username, $email) == FALSE){                
                //If username and email do not exist
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
            else{
                echo "Username or Email already exists";
            }
    
        }
        else{
            echo "No form data was passed";
        }      

    }
}