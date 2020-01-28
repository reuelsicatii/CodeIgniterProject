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
            
            
            // Redirect to TaskForm
            // ==============================================
            $username = $this->input->post('username');
            $result = $this->login_model->get_username($username);
            $session_data = array(
                'regid' => $result[0]->id,
                'username' => $result[0]->username,
                'email' => $result[0]->email,
                'password' => $result[0]->password_one
            );
            // Add user data in session
            $this->session->set_userdata('logged_in', $session_data);
            $result['tasks'] = $this->task_model->get_allbyRegID($result[0]->id);
            $this->load->view('TaskForm', $result);
        }
        
       
    }
}

?>