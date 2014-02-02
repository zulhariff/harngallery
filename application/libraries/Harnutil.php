<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Harnutil {
	var $CI;
	public function __construct($config = array()){
		$this->CI =& get_instance();
	}
    public function some_function(){
    	return "hello";
    }
    public function select_category($select_name,$class){
		$this->CI->load->model('members/art_category');
		$art_category=$this->CI->art_category->getAll();		
		$output  = '<select name="'. $select_name .'" id="' . $select_name . '" ' . $class . ' >';
		$output .= '<option value="">Please select</option>' . PHP_EOL;
		foreach ($art_category as $ac){
			$output .= "<option value='$ac->id'";			
			$output .= ">$ac->name</option>\n";
		}
		$output .= "</select>\n";	
		return $output;
	}
    public function dropdownselect($select_name,$class,$type,$selected){
		switch ($type){
			case 'category':
				$this->CI->load->model('members/art_category');
				$list=$this->CI->art_category->getAll();	
				break;
			case 'color':
				$this->CI->load->model('members/art_color');
				$list=$this->CI->art_color->getAll();	
				break;
			case 'subject':
				$this->CI->load->model('members/art_subject');
				$list=$this->CI->art_subject->getAll();	
				break;
			case 'style':
				$this->CI->load->model('members/art_style');
				$list=$this->CI->art_style->getAll();	
				break;								
			case 'orientation':
				$this->CI->load->model('members/art_orientation');
				$list=$this->CI->art_orientation->getAll();	
				break;			
		}	

		$output  = '<select name="'. $select_name .'" id="' . $select_name . '" ' . $class . ' >';
		$output .= '<option value="">Please select</option>' . PHP_EOL;
		foreach ($list as $ac){
			$output .= "<option value='$ac->id' ";	
			$output .= ($ac->id == $selected) ? ' selected="selected"' : '';			
			$output .= ">$ac->name</option>\n";
		}
		$output .= "</select>\n";	
		return $output;
	}
    public function select_color($select_name,$class){
		$this->CI->load->model('members/art_color');
		$art_category=$this->CI->art_category->getAll();		
		$output  = '<select name="'. $select_name .'" id="' . $select_name . '" ' . $class . ' >';
		$output .= '<option value="">Please select</option>' . PHP_EOL;
		foreach ($art_category as $ac){
			$output .= "<option value='$ac->id'";					
			$output .= ">$ac->name</option>\n";
		}
		$output .= "</select>\n";	
		return $output;
	}


}

/* End of file Someclass.php */