<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct();
		
		$this->load->library('layout');
		$this->layout->setLayout('layout/main');
        
		if(!$this->authentication->logged()){
			redirect("login");
        }
	}
	
	public function index() {
		
		redirect('home/dashboard');
	}
	
	public function dashboard()
	{
		//$this->layout->view('login/index');
		$this->layout->layout_title = 'Dashboard';
		$this->layout->view('home/dashboard');
	}
}