<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	public function index()
	{
		$data['title'] = 'UPSCPRE - UPSC Online Preparation';
		$this->load->view('frontend/inc/Header',$data);
		$this->load->view('frontend/Home');
		$this->load->view('frontend/inc/Footer');
	}
	function home()
	{
		$this->load->view('frontend/inc/Header');
		$this->load->view('frontend/Home');
		$this->load->view('frontend/inc/Footer');
	}
}
