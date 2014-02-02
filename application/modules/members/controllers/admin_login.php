<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin_login extends Front_Controller{

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct(){
		parent::__construct();
		
	}
	public function index(){		
		if (isset($_POST['save'])){			
			$pswd=$this->input->post('pswd');
			$query = $this->db->get_where('admin_password', array('id' => 1,'pswd'=>$pswd));
			if($query->num_rows()>0){
				$sess_array = array('logged_in' => true);
				$this->session->set_userdata('admin_loggedin', $sess_array); 	
				redirect('/members/admin');
			}else{
				Template::set('error_msg','Wrong Password');
			}					
		}		
		$this->load->helper('form');
		$this->load->view('/admin/login');
	}

	
}