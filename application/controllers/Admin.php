<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    function __construct(){
        parent::__construct();
    }
    function dashboard()
    {
        $this->load->view('backend/Header');
        $this->load->view('backend/Dashboard');
        $this->load->view('backend/Footer');
    }
}