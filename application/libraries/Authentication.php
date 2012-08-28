<?php
if(!defined('BASEPATH'))
		exit('No direct script access allowed');

class Authentication {
	var $_id_user		= 0;
	var $_username		= "";
	var $_password		= "";
	var $_role			= "";
	var $_auth			= FALSE;
	function Authentication($auto = TRUE)
	{
		if($auto)
		{
			$CI =& get_instance();
			if($this->login($CI->session->userdata('username'), $CI->session->userdata('password')))
			{
				$this->_id_user		= $CI->session->userdata('id_user');
				$this->_username	= $CI->session->userdata('username');
				$this->_password	= $CI->session->userdata('password');
				$this->_role		= $CI->session->userdata('role');
			}
		}
	}
	function getId(){return $this->_user_id;}
	function getUsername(){return $this->_username;}
	function getPassword(){return $this->_password;}
	function getLevel(){return $this->_level;}
	function getPermissions(){return $this->_permissions;}
	
	function login($username = "", $password = "")
	{
		if(empty($username) || empty($password))
			return FALSE;
		
		$CI			=& get_instance();		
		$sql		= "SELECT u.*, r.nombre as rol FROM usuario u INNER JOIN rol r ON(r.id_rol=u.id_usuario) WHERE login=? AND pass=? ";
		$query		= $CI->db->query($sql, array($username, $password));
		
		if($query->num_rows()>0)
		{
			$row					= $query->row();
			$CI->session->set_userdata('id_user', $row->id_usuario);
			$CI->session->set_userdata('username',	$username);
			$CI->session->set_userdata('password', $password);
			$CI->session->set_userdata('role', $row->rol);
			$CI->session->set_userdata('first_name', $row->nombre);
			$CI->session->set_userdata('last_name', $row->apellido);
			//$CI->session->set_userdata('status', $row->status);
			
			$this->_id_user		 = $row->id_usuario;
			$this->_username		= $username;
			$this->_password		= $password;
			$this->_role 			= $row->rol;
			$this->_auth 			= TRUE;
			return TRUE;
		}
		
		$this->_auth = FALSE;
		$this->logout();
		return FALSE;
	}
	
	function logged()
	{
		$CI =& get_instance();
		if($this->_auth && $this->_id_user != '')
			return TRUE;
		else
			return FALSE;
	}
	
	function logout()
	{
		$CI	=& get_instance();
		$CI->session->unset_userdata('id_user');
		$CI->session->unset_userdata('username');
		$CI->session->unset_userdata('password');
		$CI->session->unset_userdata('role');
		//$CI->session->sess_destroy();
		$this->_auth 			= FALSE;
		
		$CI->session->sess_destroy();
		//session_destroy(); 
		$_SESSION = array();
	}
	
	function check($level = 0, $strict = TRUE)
	{
		if(!$this->_auth)
			return FALSE;
		
		return TRUE;
	}
	
}
?>