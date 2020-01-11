<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    
    function index(){
        echo "Class: Registration -> Function: index";
    }
    
    function add_user(){
        
        // Form Validation
        //==============================================
        $this->load->library('form_validation');
        
        // Set FormValidation Rules
        //==============================================
        $this->form_validation->set_error_delimiters('<div class="error">THIS IS AN ERRORRRRRRRRRRRRR', '</div>');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[15]',
            array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|min_length[5]|max_length[15]',
            array('required' => 'You must provide a %s.'));
        
        // Run FormValidation Rules
        //==============================================
        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('/RegistrationForm');
        } 
        else {
            //Setting values for table columns
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password_one' => $this->input->post('password'),
                'password_two' => $this->input->post('confirmpassword')
            );
            
            //Transfering data to Model
            //==============================================
            $this->load->model('registration_model');
            $this->registration_model->registration_insert($data);
            $data['message'] = 'Data Inserted Successfully';
            
            //Loading View
            //==============================================
            $this->load->view('RegistrationForm', $data);
         }         

    }
}

?>