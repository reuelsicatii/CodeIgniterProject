<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{

    function index()
    {    

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



            $data = array(
                'reg_id' => $seesdata['logged_in']['regid'],
                'summary' => $this->input->post('summary'),
                'type' => $this->input->post('type'),
                'department' => $this->input->post('department'),
                'status' => 'NEW',
                'start' => '0000-00-00 00:00:00',
                'elapsed' => 0,
                'remarks' => $this->input->post('remarks')
            );

            if ($this->task_model->create_task($data)) {
                redirect('Task/create');
            } else {
                $result['transactionresult'] = FALSE;
                $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
                $this->load->view('TaskForm', $result);
            }
        } elseif (isset($this->session->userdata['logged_in']) && ! $this->input->post('username') && ! $this->input->post('password')) {


            $result['transactionresult'] = TRUE;
            $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
            $this->load->view('TaskForm', $result);
        } else {


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
            
            $data = array(
                'id' => $this->input->post('idtask'),
                'reg_id' => $seesdata['logged_in']['regid'],
                'summary' => $this->input->post('summary'),
                'type' => $this->input->post('type'),
                'department' => $this->input->post('department'),
                'remarks' => $this->input->post('remarks')
            );

            if ($this->task_model->update_task($data)) {
                redirect('Task/update');
            } else {
                $result['transactionresult'] = FALSE;
                $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
                $this->load->view('TaskForm', $result);
            }
        } elseif (isset($this->session->userdata['logged_in']) && ! $this->input->post('username') && ! $this->input->post('password')) {


            $result['transactionresult'] = TRUE;
            $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
            $this->load->view('TaskForm', $result);
        } else {


            $data = array(
                'error_message' => 'Your Session has expired. Please login.'
            );
            $this->load->view('LoginForm');
        }
    }

    function action()
    {
        $seesdata = $this->session->all_userdata();

        // This block is for START
        // ==============================================================================================================================
        if (isset($this->session->userdata['logged_in']) && $this->input->post('idtask') && $this->input->post('action') == 'Start') {


            date_default_timezone_set('Asia/Manila');
            $data = array(
                'id' => $this->input->post('idtask'),
                'reg_id' => $seesdata['logged_in']['regid'],
                'status' => 'IN PROGRESS',
                'start' => date('Y-m-d H:i:s')
            );

            if ($this->task_model->start_task($data)) {
                redirect('Task/action');
            } else {
                $result['transactionresult'] = FALSE;
                $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
                $this->load->view('TaskForm', $result);
            }
        } 
        
        // This block is for START
        // Refrain from injecting data during REFRESH
        // ==============================================================================================================================
        elseif (isset($this->session->userdata['logged_in']) && ! $this->input->post('idtask') && ! $this->input->post('action') == 'Start') {

            
            $result['transactionresult'] = TRUE;
            $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
            $this->load->view('TaskForm', $result);
        } 
        
        
        // This block is for COMPLETE
        // ==============================================================================================================================
        elseif (isset($this->session->userdata['logged_in']) && $this->input->post('idtask') && $this->input->post('action') == 'Complete') {

            date_default_timezone_set('Asia/Manila'); 
            
            $data = array(
                'id' => $this->input->post('idtask'),
                'reg_id' => $seesdata['logged_in']['regid'],
                'status' => 'COMPLETE',
                'end' => date('Y-m-d H:i:s')

            );
            
            $this->task_model->complete_task($data);
            
            $data = array(
                'id' => $this->input->post('idtask'),
                'reg_id' => $seesdata['logged_in']['regid'],
                'status' => 'COMPLETE',
                'end' => date('Y-m-d H:i:s'),
                'elapsed' => $this->task_model->get_elapsedbyRegID($data['id'])             
            );              
            
            
            if ($this->task_model->set_elapsedbyRegID($data)) {                
                redirect('Task/action');
            } else {
                $result['transactionresult'] = FALSE;
                $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
                $this->load->view('TaskForm', $result);
            }            
        } 
        
        // This block is for COMPLETE
        // Refrain from injecting data during REFRESH
        // ==============================================================================================================================
        elseif (isset($this->session->userdata['logged_in']) && ! $this->input->post('idtask') && ! $this->input->post('action') == 'Complete') {

            // echo "=========sdfsfadasd==================";
            $result['transactionresult'] = TRUE;
            $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
            $this->load->view('TaskForm', $result);
        } 
        
        
        // This block is for SESSION EXPIRED
        // ==============================================================================================================================
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