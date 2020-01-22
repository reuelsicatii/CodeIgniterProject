<?php

class Task_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        // Load Database
        // ==============================================
        $this->load->database();
    }

    function create_task($data)
    {
        $this->db->trans_start();
        $this->db->insert('task', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
            return "Task successfully created";
        } else {
            return "Task unsuccessfully created";
        }
    }

    function get_allbyRegID($data)
    {
        $condition = "reg_id =" . "'" . $data . "'";
        $this->db->select('*');
        $this->db->from('task');
        $this->db->where($condition);
        $query = $this->db->get();

        return $query->result_array();
    }
    
    function update_task($data)
    {
        $condition = "id =" . "'" . $data['id'] . "' AND " . "reg_id =" . "'" . $data['reg_id'] . "'";
        $this->db->set('type', $data['type']);
        $this->db->set('department', $data['department']);
        $this->db->set('remarks', $data['remarks']);
        $this->db->where($condition);
        $query = $this->db->update('task');
        
        if ($this->db->trans_status() === TRUE) {
            return "Task successfully updated";
        } else {
            return "Task unsuccessfully updated";
        }
    }
    
    function start_task($data)
    {
        $condition = "id =" . "'" . $data['id'] . "' AND " . "reg_id =" . "'" . $data['reg_id'] . "'";
        $this->db->set('start', $data['start']);
        $this->db->set('status', $data['status']);
        $this->db->where($condition);
        $query = $this->db->update('task');
        
        if ($this->db->trans_status() === TRUE) {
            return "Task successfully updated";
        } else {
            return "Task unsuccessfully updated";
        }
    }
    
}
?>