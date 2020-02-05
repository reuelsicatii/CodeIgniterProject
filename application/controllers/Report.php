<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

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
        $this->load->model('report_model');

        // Load "URL" helper
        // ==============================================
        $this->load->helper('url');
    }

    function index()
    {
        $this->search();
    }

    function search()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $result['tasks'] = $this->report_model->get_recenttask();
            $this->load->view('ReportForm', $result);
            
        } else {

            $this->load->view('LoginForm');
        }
    }
}

?>