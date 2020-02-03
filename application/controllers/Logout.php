<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
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

        // Load "Login_Model"
        // ==============================================
        $this->load->model('login_model');
        $this->load->model('task_model');

        // Load "Login_Model"
        // ==============================================
        $this->load->helper('url');
    }

    function index()
    {
        $this->deletesession();
    }

    function deletesession()
    {
        $this->session->unset_userdata('logged_in');
        $this->load->view('LoginForm');
        
    }
}

?>