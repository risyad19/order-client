<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
	}
	
	public function index()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('temp/navbar');
		$this->load->view('view-home');
	}
}