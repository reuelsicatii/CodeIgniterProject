<?php

class Registration_Model extends CI_Model
{

    function registration_insert($data)
    {
        $this->load->database();
        
        // Inserting DATA in Table(registration) of Database(stardbapp)
        $this->db->insert('registration', $data);
    }
}
?>