<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        echo "Default: \\User\\index"; 
    }
    
    public function details()
    {
        $this->load->model("user_model");
        $data['userArray'] = $this->user_model->get_dataArray();
        $data['userArrayArray'] = $this->user_model->get_dataArrayArray();
        $this->load->view("user_details", $data);
    }
}
