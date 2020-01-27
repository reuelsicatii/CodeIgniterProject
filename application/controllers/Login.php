<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
        $this->authentication();
    }

    function authentication()
    {
        // Check if SESSION is SET
        // ================================================
        if (isset($this->session->userdata['logged_in'])) {

            $seesdata = $this->session->all_userdata();

            $result['tasks'] = $this->task_model->get_allbyRegID($seesdata['logged_in']['regid']);
            $this->load->view('TaskForm', $result);
        } // Check if SESSION is SET
        // Username & Password are SET
        // ================================================
        elseif (! isset($this->session->userdata['logged_in']) && $this->input->post('username') && $this->input->post('password')) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

            // Compare input value from form against DB
            // ==============================================
            $authentication = $this->login_model->authentication($data);

            if ($authentication == true) {

                $username = $this->input->post('username');
                $result = $this->login_model->get_username($username);

                if ($result == true) {

                    // Create Session and load to HOME page
                    // ==============================================
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
            } else {

                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('LoginForm', $data);
            }
        } else {
            $this->load->view('LoginForm');
        }
    }
}

?>