<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct();
	}
	
	public function index()
	{
		if(!$this->authentication->logged())
			$this->load->view('layout/login');
		else
			redirect('home/dashboard');
	}
	
	function verify()
	{
		$result_ = $this->authentication->login($_POST['username'], $_POST['password']);
		if($result_)
			echo "success";
		else
			echo "error";
	}
	
	function logout()
	{
		$this->authentication->logout();
		redirect("login");
	}
}