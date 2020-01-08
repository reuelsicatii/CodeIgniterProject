<?php

class Login_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        
        // Load Database
        //==============================================
        $this->load->database();
    }
    
    function authentication($data)
    {
        
        
        $condition = "username =" . "'" . $data['username'] . "' AND " . "password_one =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    function get_username($username){
        
        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }        
        
    }
    
}
?>