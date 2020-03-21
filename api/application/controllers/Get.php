<?php

class Get extends CI_Controller{
    public function index(){
        //CORS. Allow access from all domains and stuff
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Authorization");

    }
    public function users($username){
        //CORS. Allow access from all domains and stuff
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Authorization");

        $this->load->model('Database_model', 'dbmodel');
        echo $this->dbmodel->getAllData($username);
    }
    public function login(){
        //CORS. Allow access from all domains and stuff
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Authorization");
        
        if(isset($_POST["username"])){
            $this->load->database();
            $this->load->model('Database_model', 'dbmodel');

            $username = $this->input->post("username");
            $password = $this->input->post("password");

            //Check if user exists with the dbmodel
            if($this->dbmodel->userExists($username, "__null__email__")){
                //NOT the most efficient, but the WHERE username==$username method wasn't working
                $query = $this->db->query("SELECT * FROM users");
                foreach($query->result_array() as $row){
                    if($row["username"] == $username)
                    {
                        if($row["password"] == $password){
                            echo "1";
                        }
                        else{
                            echo "Incorrect Password";
                        }
                    }
                }
                
            }
            else{
                echo "User $username does not exist";
            }
            
        }
    }
}