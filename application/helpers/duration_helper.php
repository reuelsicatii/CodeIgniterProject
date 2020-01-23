<?php
defined('BASEPATH') or exit('No direct script access allowed');


    function index()
    {
        echo "Duration_Helper->Index";
        
    }
    
    
    function subtract($toDate, $fromDate)
    {
        $ToDate = new DateTime($toDate);
        $FromDate = new DateTime($fromDate);        
        $diff = $FromDate->diff($ToDate);
        
        //return $diff->d." :".
    }

?>