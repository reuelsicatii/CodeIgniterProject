<?php

class Login extends CI_Controller
{

    function index()
    {
        echo "Class: Login -> Function: index";
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
    }

    function authentication()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // Run FormValidation Rules
        // Returns FALSE (boolean false) by default.
        // Returns TRUE if it has successfully applied
        // your rules without any of them failing.
        // ==============================================
        
        // var_dump($_POST);
        // exit;
        
        if ($this->form_validation->run() === FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                
                // If User still have a session 
                // thus still login
                // redirect to Home Page
                // ==============================================
                $result['userArrayArrayfromDB'] = $this->login_model->get_all();
                $this->load->view('Home',$result);                
                $this->load->view('Home');
                
            } else {
                
                // If User dont have a session
                // thus not login
                // redirect to Login Page
                // ==============================================
                $this->load->view('LoginForm');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

            // Compare input value from form against DB
            // ==============================================
            $result = $this->login_model->authentication($data);
            if ($result == true) {
                
                $username = $this->input->post('username');
                $result = $this->login_model->get_username($username);
               

                if ($result != false) {
                    
                    // Create Session and load to HOME page
                    // ==============================================
                    $session_data = array(
                        'username' => $result[0]->username,
                        'email' => $result[0]->email
                    );
                    // Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    
                    $result['userArrayArrayfromDB'] = $this->login_model->get_all();
                    $this->load->view('Home',$result);
                }
                } else {
                    
                    // Throw an Error message to view
                    // ==============================================
                    $data = array(
                        'error_message' => 'Invalid Username or Password'
                    );
                    $this->load->view('LoginForm', $data);
                }
        }
    }
}

?>