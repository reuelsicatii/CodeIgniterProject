<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{

    function index()
    {
        
        date_default_timezone_set('Asia/Manila');
        
        $timeFirst = strtotime('2020-01-23 06:08:51');
        $timeSecond = strtotime('2020-01-23 07:38:03');
        $differenceInSeconds = $timeSecond - $timeFirst;
        echo "Result: " . $differenceInSeconds;
        echo "</br>";
        echo "Result: " . $differenceInSeconds/(60*60);
        echo "</br>";
        echo "</br>";
        echo "</br>";
        echo "</br>";
        
        
        $date1 = strtotime("2020-01-23 06:00:00");
        $date2 = date('Y-m-d H:i:s');        
        $diff = ($date2 - $date1);  
        
        echo "Date 1: "."2020-01-23 06:00:00";
        echo "</br>";
        echo "Date 2: ".date('Y-m-d H:i:s');
        echo "</br>";
        echo "Result: " . $diff;
        echo "</br>";
        echo "Result: " . $diff/(60*60);
        echo "</br>";
        
        
        
        echo "</br>";
        echo "</br>";
        echo "</br>";
        echo "Result: " . date('Y-m-d H:i:s',strtotime('-24 hours'));

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

        // This block is for START
        // ==============================================================================================================================
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
                redirect('Task/action');
            } else {
                $result['transactionresult'] = FALSE;
                $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
                $this->load->view('TaskForm', $result);
            }
        } 
        elseif (isset($this->session->userdata['logged_in']) && ! $this->input->post('idtask') && ! $this->input->post('action') == 'Start') {

            
            $result['transactionresult'] = TRUE;
            $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
            $this->load->view('TaskForm', $result);
        } 
        
        
        // This block is for PAUSE
        // ==============================================================================================================================
        elseif (isset($this->session->userdata['logged_in']) && $this->input->post('idtask') && $this->input->post('action') == 'Pause') {

            date_default_timezone_set('Asia/Manila');

            if ($this->task_model->get_elapsedbyRegID($this->input->post('idtask')) == 0) {
                $data = array(
                    'id' => $this->input->post('idtask'),
                    'reg_id' => $seesdata['logged_in']['regid'],
                    'status' => 'PAUSE',
                    'end' => date('Y-m-d H:i:s e'),
                    'elapsed' => strtotime(date('Y-m-d H:i:s')) - strtotime($this->task_model->get_startbyRegID($this->input->post('idtask')))
                );

                if ($this->task_model->pause_task($data)) {
                    redirect('Task/action');
                } else {
                    $result['transactionresult'] = FALSE;
                    $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
                    $this->load->view('TaskForm', $result);
                }
            } 
            else {
                
                $elapsed= strtotime(date('Y-m-d H:i:s e'))-strtotime($this->task_model->get_endbyRegID($this->input->post('idtask')));                
                $data = array(
                    'id' => $this->input->post('idtask'),
                    'reg_id' => $seesdata['logged_in']['regid'],
                    'status' => 'PAUSE',
                    'end' => date('Y-m-d H:i:s e'),
                    'elapsed' => $elapsed + $this->task_model->get_elapsedbyRegID($this->input->post('idtask'))
                );

                if ($this->task_model->pause_task($data)) {
                    redirect('Task/action');
                } else {
                    $result['transactionresult'] = FALSE;
                    $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
                    $this->load->view('TaskForm', $result);
                }
            }

            // echo "=========withsessiontop==================";
        } 
        elseif (isset($this->session->userdata['logged_in']) && ! $this->input->post('idtask') && ! $this->input->post('action') == 'Pause') {

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