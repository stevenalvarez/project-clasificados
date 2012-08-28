<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct();
		
		$this->load->library('layout');
		$this->layout->setLayout('layout/main');
        
		if(!$this->authentication->logged()){
			redirect("login");
        }
	}
	
	public function index() {
		
		$this->layout->layout_title = 'Categorias';
		$this->layout->view('categorias/list');
	}
	
	public function nuevo()
	{
		$this->layout->layout_title = 'Nueva Categoria';
		$this->layout->view('categorias/add');
	}
}