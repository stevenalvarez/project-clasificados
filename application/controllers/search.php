<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct();
		
		$this->load->library('layout');
		$this->layout->setLayout('layout/frontend');
        
		if(!$this->authentication->logged()){
			redirect("login");
        }
	}
	
	public function index() 
    {	
        if(isset($_GET) && !empty($_GET)){
            $array = array();
            $obj->title = "Nissan Murano recien llegado";
            $obj->description = "Vendo Nissan Murano modelo 2005 por motivos de viaje, esta en perfecto estado, recientemente compre las llantas y los aros. interesados llamar al 72548935 por las noches.";
            $obj->title = "Automoviles";
            
            for($i=0;$i<5;$i++)
            {
                $array[] = $obj;
            }
            
            $data['result'] = $array;
            $data['string'] = $this->input->get("string");
            $this->layout->view('search/result', $data);            
            
        }else{
            $data['string'] = "";
            $this->layout->view('search/index', $data);
        }
	}
}