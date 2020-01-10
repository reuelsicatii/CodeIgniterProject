<?php

class Task extends CI_Controller
{

    function index()
    {
        echo "Class: Login -> Function: index";
        
        // Declare two dates
        $start_date = strtotime("2018-06-08");
        $end_date = strtotime("2018-09-19");
        
        // Get the difference and divide into
        // total no. seconds 60/60/24 to get
        // number of days
        echo "Difference between two dates: "
            . ($end_date - $start_date); 
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

    function create()
    {
        
        $this->load->view('TaskForm');
        
        
//         $this->form_validation->set_rules('type', 'Task Type', 'trim|required');
//         $this->form_validation->set_rules('department', 'Department', 'trim|required');
        
//         if ($this->form_validation->run() === FALSE) {
//             if (isset($this->session->userdata['logged_in'])) {
                
//                 // If User still have a session
//                 // thus still login
//                 // redirect to Home Page
//                 // ==============================================
//                 $data = array(
//                     'type' => $this->input->post('type'),
//                     'department' => $this->input->post('department'),
//                     'remarks' => $this->input->post('remarks')
//                 );
                
//                 $result = $this->login_model->get_username($username);
                
//             } else {
                
//                 // If User dont have a session
//                 // thus not login
//                 // redirect to Login Page
//                 // ==============================================
//                 $this->load->view('LoginForm');
//             }
//         } else {
//             $data = array(
//                 'username' => $this->input->post('username'),
//                 'password' => $this->input->post('password')
//             );
            
//             // Compare input value from form against DB
//             // ==============================================
//             $result = $this->login_model->authentication($data);
//             if ($result == true) {
                
//                 $username = $this->input->post('username');
//                 $result = $this->login_model->get_username($username);
                
                
//                 if ($result != false) {
                    
//                     // Create Session and load to HOME page
//                     // ==============================================
//                     $session_data = array(
//                         'username' => $result[0]->username,
//                         'email' => $result[0]->email
//                     );
//                     // Add user data in session
//                     $this->session->set_userdata('logged_in', $session_data);
                    
//                     $result['userArrayArrayfromDB'] = $this->login_model->get_all();
//                     $this->load->view('Home',$result);
//                 }
//             } else {
                
//                 // Throw an Error message to view
//                 // ==============================================
//                 $data = array(
//                     'error_message' => 'Invalid Username or Password'
//                 );
//                 $this->load->view('LoginForm', $data);
//             }
//         }
        
        
    }
    
    function action()
    {
        
        
        
        if ($this->input->post('Start')) {
            echo "Value: ".$this->input->post('Start');
        }
        else if ($this->input->post('Complete')) {
            echo "Value: ".$this->input->post('Complete');
        }
        
    }
    
}

?>