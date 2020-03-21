<?php

class Database_model extends CI_Model{
    public function userExists($user, $email){
        $this->load->database();
        $query = $this->db->query("SELECT * FROM users");
        foreach($query->result_array() as $row){
            if ($row["username"] == $user)
                return TRUE;
            
            else if($row["email"] == $email)
                return TRUE;
        }
        return FALSE;
    }
}