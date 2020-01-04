<?php

class User extends CI_Model
{

    public $Username;
    public $Email;
    public $Password;
    public $ConfirmPassword;
    
    public function test_main()
    {
        echo "This is a model function";
    }

    public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    public function insert_entry()
    {
        $this->Username = $_POST['username']; // please read the below note
        $this->Email = $_POST['email'];
        $this->Password = $_POST['password'];
        $this->ConfirmPassword = $_POST['confirmpassword'];

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->Username = $_POST['username']; // please read the below note
        $this->Email = $_POST['email'];
        $this->Password = $_POST['password'];
        $this->ConfirmPassword = $_POST['confirmpassword'];

        $this->db->update('entries', $this, array(
            'id' => $_POST['id']
        ));
    }
}

?>