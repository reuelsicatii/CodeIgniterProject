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
            // echo "Model->create_task: Task successfully created";
            return TRUE;
        } else {
            // echo "Model->create_task: Task successfully created";
            return FALSE;
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
}
?>