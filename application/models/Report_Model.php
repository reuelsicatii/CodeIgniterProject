<?php

class Report_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        // Load Database
        // ==============================================
        $this->load->database();
    }

    function get_recenttasks()
    {

        $this->db->select('*');
        $this->db->from('task');
        $this->db->limit(25);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    function get_users()
    {
        
        $this->db->select('email');
        $this->db->from('registration');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    
}
?>