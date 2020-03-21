<?php

class Database_model extends CI_Model{
    public function userExists($user, $email){
        $this->load->database();
        $query = $this->db->query("SELECT * FROM users");
        foreach($query->result() as $row){
            if ($row->username == $user)
                return True;
            
            if($row->email == $email)
                return True;
        }
        return False;
    }
}