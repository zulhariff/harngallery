<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_HarngalleryUtilities {
	var $CI;
	public function __construct($config = array()){
		$this->CI =& get_instance();
		
	}
    public function some_function()
    {
    }
	public function select_category($select_name,$class){
		$this->CI->load->model('art_category');
		$art_category=$this->CI->art_category->getAll();
		/*
		$output  = '<select name="'. $select_name .'" id="' . $select_name . '" ' . $class . ' >';
		$output .= '<option value="">&nbsp;</option>' . PHP_EOL;
		foreach ($art_category as $key => $value){
			$output .= "<option value='$value'";
			$output .= ($country_iso == $selected_iso) ? ' selected="selected"' : '';
			$output .= empty($selected_iso) && ($default_iso == $country_iso) ? ' selected="selected"' : '';
			$output .= ">{$country['printable']}</option>\n";
		}
		$output .= "</select>\n";
		*/
		return $art_category;
	}

	public function select_medium(){
		$this->CI->load->model('art_medium');
		$art_category=$this->CI->art_category->getAll();
		return $art_category;
	}
	public function select_orientation(){
		$this->CI->load->model('art_orientation');
		$art_category=$this->CI->art_category->getAll();
		return $art_category;
	}		
	public function select_size(){
		$this->CI->load->model('art_size');
		$art_category=$this->CI->art_category->getAll();
		return $art_category;
	}
	public function select_color(){
		$this->CI->load->model('art_color');
		$art_category=$this->CI->art_category->getAll();
		return $art_category;
	}	
}

