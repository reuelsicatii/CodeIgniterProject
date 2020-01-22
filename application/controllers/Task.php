<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{

    function index()
    {
        echo "Class: Login -> Function: index";
        echo "<br>";
        echo "Difference between two dates(Hr): " . (strtotime("2020-01-11 00:00:00") - strtotime("2020-01-11 00:60:00")) / 60 / 60;
        $diff = (strtotime("2020-01-11 00:00:10") - strtotime("2020-01-11 00:00:00"))/60/60;
        echo "<br>";
        echo "Difference between two dates(Hrs): " . gmdate("H:i:s", $diff);
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

        // Load "Task_Model" model
        // ==============================================
        $this->load->model('task_model');

        // Load "URL" helper
        // ==============================================
        $this->load->helper('url');
    }

    function create()
    {
        $seesdata = $this->session->all_userdata();

        if (isset($this->session->userdata['logged_in']) && $this->input->post('type') && $this->input->post('department')) {

            // echo "=========aaaaaaaaaaaaa==================";

            $data = array(
                'reg_id' => $seesdata['logged_in']['regid'],
                'type' => $this->input->post('type'),
                'department' => $this->input->post('department'),
                'status' => 'NEW',
                'start' => '0000-00-00 00:00:00',
                'elapsed' => 0,
                'remarks' => $this->input->post('remarks')
            );
            // echo "=========withsessiontop==================";
            if ($this->task_model->create_task($data)) {
                redirect('Task/update');
            } else {
                $result['transactionresult'] = FALSE;
                $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
                $this->load->view('TaskForm', $result);
            }
        } elseif (isset($this->session->userdata['logged_in']) && ! $this->input->post('username') && ! $this->input->post('password')) {

            // echo "=========sdfsfadasd==================";
            $result['transactionresult'] = TRUE;
            $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
            $this->load->view('TaskForm', $result);
        } else {

            // echo "=========withoutsession==================";
            $data = array(
                'error_message' => 'Your Session has expired. Please login.'
            );
            $this->load->view('LoginForm');
        }
    }

    function update()
    {
        $seesdata = $this->session->all_userdata();

        if (isset($this->session->userdata['logged_in']) && $this->input->post('type') && $this->input->post('department')) {

            // echo "=========aaaaaaaaaaaaa==================";

            $data = array(
                'id' => $this->input->post('idtask'),
                'reg_id' => $seesdata['logged_in']['regid'],
                'type' => $this->input->post('type'),
                'department' => $this->input->post('department'),
                'remarks' => $this->input->post('remarks')
            );
            // echo "=========withsessiontop==================";
            if ($this->task_model->update_task($data)) {
                redirect('Task/update');
            } else {
                $result['transactionresult'] = FALSE;
                $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
                $this->load->view('TaskForm', $result);
            }
        } elseif (isset($this->session->userdata['logged_in']) && ! $this->input->post('username') && ! $this->input->post('password')) {

            // echo "=========sdfsfadasd==================";
            $result['transactionresult'] = TRUE;
            $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
            $this->load->view('TaskForm', $result);
        } else {

            // echo "=========withoutsession==================";
            $data = array(
                'error_message' => 'Your Session has expired. Please login.'
            );
            $this->load->view('LoginForm');
        }
    }

    function action()
    {
        $seesdata = $this->session->all_userdata();

        //This block is for START
        //==============================================================================================================================
        if (isset($this->session->userdata['logged_in']) && $this->input->post('idtask') && $this->input->post('action') == 'Start') {

            // echo "=========aaaaaaaaaaaaa==================";
            date_default_timezone_set('Asia/Manila');
            $data = array(
                'id' => $this->input->post('idtask'),
                'reg_id' => $seesdata['logged_in']['regid'],
                'status' => 'IN PROGRESS',
                'start' => date('Y-m-d H:i:s e')
            );
            // echo "=========withsessiontop==================";
            if ($this->task_model->start_task($data)) {
                redirect('Task/start');
            } else {
                $result['transactionresult'] = FALSE;
                $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
                $this->load->view('TaskForm', $result);
            }
        } elseif (isset($this->session->userdata['logged_in']) && ! $this->input->post('idtask') && $this->input->post('action') == 'Start') {

            // echo "=========sdfsfadasd==================";
            $result['transactionresult'] = TRUE;
            $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
            $this->load->view('TaskForm', $result);
        } 
        
        //This block is for PAUSE
        //==============================================================================================================================
        if (isset($this->session->userdata['logged_in']) && $this->input->post('idtask') && $this->input->post('action') == 'Pause') {
            
            // echo "=========aaaaaaaaaaaaa==================";
            date_default_timezone_set('Asia/Manila');
            $data = array(
                'id' => $this->input->post('idtask'),
                'reg_id' => $seesdata['logged_in']['regid'],
                'status' => 'IN PROGRESS',
                'start' => date('Y-m-d H:i:s e')
            );
            // echo "=========withsessiontop==================";
            if ($this->task_model->start_task($data)) {
                redirect('Task/start');
            } else {
                $result['transactionresult'] = FALSE;
                $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
                $this->load->view('TaskForm', $result);
            }
        } elseif (isset($this->session->userdata['logged_in']) && ! $this->input->post('idtask') && $this->input->post('action') == 'Pause') {
            
            // echo "=========sdfsfadasd==================";
            $result['transactionresult'] = TRUE;
            $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
            $this->load->view('TaskForm', $result);
        }
        
        
        
        
        
        
        
        
        
        else {

            // echo "=========withoutsession==================";
            $data = array(
                'error_message' => 'Your Session has expired. Please login.'
            );
            $this->load->view('LoginForm');
        }
    }

    function action2()
    {
        if ($this->input->post('start')) {
            echo "Value: " . $this->input->post('start');
        } else if ($this->input->post('Complete')) {
            echo "Value: " . $this->input->post('Complete');
        }
    }
}

?>