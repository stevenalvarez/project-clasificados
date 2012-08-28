<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
    
    var $obj;
    var $layout;
	
	var $section = '';
	
	var $layout_title = '';
    
    function Layout($layout = "layout/main")
    {
        $this->obj =& get_instance();
        $this->layout = $layout;
    }

    function setLayout($layout)
    {
      $this->layout = $layout;
    }
    
    function view($view, $data=null, $return=false)
    {
        $data['content_for_layout'] = $this->obj->load->view($view,$data,true);
		$data['section'] = $this->section;
		$data['layout_title'] = $this->layout_title;
        
        if($return)
        {
            $output = $this->obj->load->view($this->layout,$data, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout,$data, false);
        }
    }
}
?>