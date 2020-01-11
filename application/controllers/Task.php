<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{

    function index()
    {
        echo "Class: Login -> Function: index";
        echo "<br>";
        echo "Difference between two dates(Hr): " .(strtotime("2020-01-11 01:43:10") - strtotime("2020-01-10 15:43:08"))/60/60;
        echo "<br>";
        echo "Difference between two dates(Hrs): " .gmdate("H:i:s", (strtotime("2020-01-11 01:43:10") - strtotime("2020-01-10 15:43:08")));

    }

    public function __construct()
    {
        parent::__construct();

        // Load form validation library
        // ==============================================
        $this->load->library('form_validation');

        // Load session library
        // ==============================================
        $this->load->library('session');

        // Load "Login_Model"
        // ==============================================
        $this->load->model('task_model');
    }

    function create()
    {

        if (isset($this->session->userdata['logged_in']))
        {
            
            $seesdata = $this->session->all_userdata();
            $data = array(
                'reg_id' => $seesdata['logged_in']['regid'],
                'type' => $this->input->post('type'),
                'department' => $this->input->post('department'),
                'status' => 'New',
                'start' => date('Y-m-d H:i:s'),
                'elapsed' => 0,
                'remarks' => $this->input->post('remarks')
            );
            echo "=========withsessiontop==================";
            $result['createtaskresult'] = $this->task_model->create_task($data);
            $result['tasks'] = $this->task_model->get_allbyRegID($data);
            $this->load->view('TaskForm', $result);
        } else {
            
            echo "=========withoutsession==================";
            $this->load->view('LoginForm');
        }
    }
    
    function update()
    {
        
        $this->form_validation->set_rules('type', 'Task Type', 'trim|required');
        $this->form_validation->set_rules('department', 'Department', 'trim|required');
        
        if ($this->form_validation->run() === FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                
                $seesdata = $this->session->all_userdata();
                $data = array(
                    'reg_id' => $seesdata['logged_in']['regid'],
                    'type' => $this->input->post('type'),
                    'department' => $this->input->post('department'),
                    'status' => 'new',
                    'start' => date('Y-m-d H:i:s'),
                    'elapsed' => 0,
                    'remarks' => $this->input->post('remarks')
                );
                
                $result['resultBool'] = $this->task_model->create_task($data);
                $this->load->view('TaskForm', $result);
            } else {
                
                $this->load->view('TaskForm');
            }
        } else {
            $seesdata = $this->session->all_userdata();
            $data = array(
                'reg_id' => $seesdata['logged_in']['regid'],
                'type' => $this->input->post('type'),
                'department' => $this->input->post('department'),
                'status' => 'new',
                'start' => date('Y-m-d H:i:s'),
                'elapsed' => 0,
                'remarks' => $this->input->post('remarks')
            );
            
            $result['resultMessage'] = $this->task_model->create_task($data);
            $this->load->view('TaskForm', $result);
        }
    }

    function action()
    {
        if ($this->input->post('start')) {
            echo "Value: " . $this->input->post('start');
        } else if ($this->input->post('Complete')) {
            echo "Value: " . $this->input->post('Complete');
        }
    }
}

?>