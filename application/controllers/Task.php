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