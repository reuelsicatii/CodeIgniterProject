<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{

    function index()
    {
        // echo "Class: Registration -> Function: index";
        $this->load->view('RegistrationForm');
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
        $this->load->model('login_model');
        $this->load->model('task_model');
        $this->load->model('registration_model');

        // Load "Login_Model"
        // ==============================================
        $this->load->helper('url');
    }

    function add_user()
    {

        // Set FormValidation Rules
        // ==============================================
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required');

        // Run FormValidation Rules
        // ==============================================
        if ($this->form_validation->run() == FALSE) {
            echo "aaaaaa";
            $this->load->view('RegistrationForm');
        } else {

            // Setting values for table columns
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password_one' => $this->input->post('password'),
                'password_two' => $this->input->post('confirmpassword')
            );

            // Transfering data to Model
            // ==============================================
            $this->registration_model->registration_insert($data);
            $data['message'] = TRUE;
            $this->load->view('RegistrationForm', $data);             
        }
        
       
    }
}

?>