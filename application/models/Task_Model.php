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

    function update_task($data)
    {
        $condition = "id =" . "'" . $data['id'] . "' AND " . "reg_id =" . "'" . $data['reg_id'] . "'";
        $this->db->set('summary', $data['summary']);
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

    function complete_task($data)
    {
        $condition = "id =" . "'" . $data['id'] . "' AND " . "reg_id =" . "'" . $data['reg_id'] . "'";
        $this->db->set('status', $data['status']);
        $this->db->set('end', $data['end']);
        $this->db->where($condition);
        $query = $this->db->update('task');

        if ($this->db->trans_status() === TRUE) {
            return "Task successfully updated";
        } else {
            return "Task unsuccessfully updated";
        }
    }

    // ================================================================================================================
    function get_allbyRegID($data)
    {
        $condition = "reg_id =" . "'" . $data . "'";
        $this->db->select('*');
        $this->db->from('task');
        $this->db->where($condition);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_startbyRegID($data)
    {
        $condition = "reg_id =" . "'" . $data . "'";
        $this->db->select('start');
        $this->db->from('task');
        $this->db->where($condition);
        $query = $this->db->get();

        return $query;
    }

    function get_elapsedbyRegID($data)
    {
        $query = $this->db->query("SELECT
          CONCAT(
            FLOOR(HOUR(TIMEDIFF(`start`, `end`)) / 24),
            ' ',
            MOD(HOUR(TIMEDIFF(`start`, `end`)), 24),
            ':',
            MINUTE(TIMEDIFF(`start`, `end`)),
            ':',
            SECOND(TIMEDIFF(`start`, `end`))
          ) AS elapsed
        FROM
          `task`
        WHERE id =" . $data);

        return $query->result();
    }

    function set_elapsedbyRegID($data)
    {        
        $condition = "id =" . "'" . $data['id'] . "' AND " . "reg_id =" . "'" . $data['reg_id'] . "'";
        $this->db->set('elapsed', $data['elapsed']['0']->elapsed);
        $this->db->where($condition);
        $query = $this->db->update('task');
        
        if ($this->db->trans_status() === TRUE) {
            return "Task successfully updated";
        } else {
            return "Task unsuccessfully updated";
        }        
    }

    function get_endbyRegID($data)
    {
        $condition = "reg_id =" . "'" . $data . "'";
        $this->db->select('end');
        $this->db->from('task');
        $this->db->where($condition);
        $query = $this->db->get();

        return $query;
    }
}
?>