<?php

class Post extends CI_Controller{
    public function index(){
        //This is for Registration

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

    public function update(){
        //CORS. Allow access from all domains and stuff
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Authorization");

        //No need for a model here as this is the only place where updates will take place, no need to reuse as of now
        if(isset($_POST["username"])){
            $this->load->database();

            $username = $this->input->post('username');
            $name = $this->input->post('name');
            $mobile = $this->input->post('mobile');
            $bio = $this->input->post('bio');
            $github = $this->input->post('github');
            $devfolio = $this->input->post('devfolio');
            $facebook = $this->input->post('facebook');
            $twitter = $this->input->post('twitter');
            $linkedin = $this->input->post('linkedin');

            $data = array(
                'name' => ($name == "") ? NULL : $name,
                'mobile' => ($mobile == "") ? NULL : $mobile,
                'bio' => ($bio == "") ? NULL : $bio,
                'github' => ($github == "") ? NULL : $github,
                'devfolio' => ($devfolio == "") ? NULL : $devfolio,
                'facebook' => ($facebook == "") ? NULL : $facebook,
                'twitter' => ($twitter == "") ? NULL : $twitter,
                'linkedin' => ($linkedin == "") ? NULL : $linkedin
            );

            //This is how codeigniter makes updating easier:
            $this->db->where('username', $username);
            $this->db->update('users', $data);

            //YAYYY THIS ACTUALLY WORKS
            
            echo "success";

        }
        else{
            echo "No data to update";
        }
    }
}