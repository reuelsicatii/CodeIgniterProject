<?php

class User_model extends CI_Model
{

    public $Username;

    public $Email;

    public $Password;

    public $ConfirmPassword;

    public function get_dataArray()
    {
        return [
            "Username" => "WengSicat",
            "Email" => "reuel@axadra.com",
            "Password" => "WengSicat87",
            "ConfirmPassword" => "WengSicat87"
        ];
    }
    
    public function get_dataArrayArray()
    {
        return [
            [
                "Username" => "JenSicat",
                "Email" => "jen@axadra.com",
                "Password" => "jenpukingking",
                "ConfirmPassword" => "jenpukingking"
            ],
            [
                "Username" => "StarSicat",
                "Email" => "star@axadra.com",
                "Password" => "stariray",
                "ConfirmPassword" => "stariray"
            ]
        ];
    }
    
}
?>