<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class members extends Front_Controller{
	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');	
		$this->load->model('members_model');
		$this->lang->load('members');	
		
		Assets::add_js( array('jquery-1.7.2.min.js', 'jquery.validate.js','bootstrap.min.js' ,'jquery.masonry.min.js','scripts.js' ));
		Assets::add_css( array('bootstrap.min.css', 'bootstrap-responsive.min.css', 'bootstrap-lightbox.css','style.css'));
		//Assets::add_module_js('members', 'members.js');
		//Assets::add_js( '$(".datepicker").datepicker();', 'inline' );
		//Template::set_block('registration_modal','members/registration_modal');		
	}

	public function imageupload(){
		$members=$this->session->userdata('members_loggedin');
		$subdir=$this->input->post('subdir');
		if($subdir="")
			$subdir="temp";			
		if($members){
			$subdir_options=$members['id']."/".$subdir."/";
		}else{
			$subdir_options="/".$subdir."/";
		}
		//$upload_dir="/home1/harngall/public_html/uploads/".$subdir_options;
		//$upload_url="http://www.harngallery.com/uploads/".$subdir_options;
		$upload_dir=$this->config->item('upload_dir').$subdir_options;
		$upload_url=$this->config->item('upload_url').$subdir_options;
		$options=array('upload_dir'=>$upload_dir,'upload_url'=>$upload_url);
		$this->load->library('UploadHandler',$options);
	}


	public function registration_upload(){		
		$members=$this->session->userdata('members_loggedin');
		if(!$members)
			die();
		$options = array('upload_dir'=>'/home1/harngall/public_html/files/'.$members['id'], 'upload_url'=>'http://www.harngallery.com/files/'.$members['id'].'/');
		$this->load->library('UploadHandler');
		return;
	}
	/**
	 * Displays a list of form data.
	 *
	 * @return void
	 */
	public function index(){
		$records = $this->members_model->find_all();
		Template::set('records', $records);
		Template::render();
	}


	public function login(){
		$this->load->model("memberlogin","login");
		$userdata=$this->login->verifylogin($this->input->post('email'), md5($this->input->post('password')),1);
		$json=array("status"=>0,"message"=>"Error");
		if($userdata){
			$this->setSession($userdata);			
			$json=array("status"=>1);			
		}else{
			$json=array("status"=>0,"message"=>"Login failed. Invalid username or password");
		}		
		echo json_encode($json);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}

	public function verify_registration(){
		$token=$_GET['token'];		
		$email=$_GET['email'];
		$this->load->model("memberlogin","login");
		$userdata=$this->login->verifylogin($email, $token,0);
		if(!$token || !$email){
			echo "error";
		}else{
			if($userdata){
				$data['verified']=1;
				$this->db->where('id', $userdata->id);
				$this->db->update('members', $data); 
				$this->setSession($userdata);
				redirect('registration');				
			}else{
				echo "invalid link";
			}
		}
	}
	private function populateMemberData($member,$userdata){
		$member['id']=$userdata->id;
	}
	private function sendnewregistrationemail($firstname,$email,$token){
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->from('info@harngallery.com', 'Harn Gallery');
		$this->email->to($email); 
		//$this->email->to('zulkarnain.shariff@gmail.com'); 
		//$this->email->bcc('zulkarnain.shariff@gmail.com');		
		$this->email->subject('New Account Confirmation');
		$data['email']=$email;
		$data['firstname']=$firstname;
		$data['token']=$token;
		$data['link']="http://www.harngallery.com/verify_registration?token=".$token."&email=".$email;
		$message = $this->load->view('new_registration',$data,TRUE); 
		$this->email->message($message);

		$this->email->send();
	}
	private function sendForgetPasswordEmail($email){
		$userdata=$this->members_model->find_by("email",$this->input->post('email'));
		if($userdata){
			$this->load->library('email');
			$this->email->set_mailtype("html");
			$this->email->from('info@harngallery.com', 'Harn Gallery');
			$this->email->to($email); 
		
			$this->email->subject('Forget Password');			
			$data['email']=$userdata->email;
			$data['firstname']=$userdata->firstname;
			$data['lastname']=$userdata->lastname;			
			$length = 10;

			$data['password'] = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

			$d['pswd']=md5($data['password']);
			$this->db->where('id', $userdata->id);
			$this->db->update('members', $d); 

			$message = $this->load->view('forget_password',$data,TRUE); 
			$this->email->message($message);
			$this->email->send();			
		}

	}
	public function forget_password_action(){
		$message="";
		if (isset($_POST['email'])){
			$userdata=$this->members_model->find_by("email",$this->input->post('email'));
			if($userdata){
				$this->sendForgetPasswordEmail($userdata->email);
				$message="Email have been sent";	
			}else{
				$message="No record found";
			}
		}
		Template::set('message',$message);
		Template::render();
	}

	private function setSession($userdata){
		$sess_array = array(
			'id' => $userdata->id,
			'firstname'=>$userdata->firstname,
			'lastname'=>$userdata->lastname,
			'email'=>$userdata->email,
			'type'=>$userdata->type);
		$this->session->set_userdata('members_loggedin', $sess_array); 		
	}
	public function favourite_art()	{
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			Template::set('members',$members);
			Template::render();
		}else
			redirect('/');
	}
	public function favourite_artists()	{
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			Template::set('members',$members);
			Template::render();
		}else
			redirect('/');
	}
	public function orders()	{
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			Template::set('members',$members);
			Template::render();
		}else
			redirect('/');
	}
	public function account_info()	{
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			Template::set('members',$members);
			Template::render();
		}else
			redirect('/');
	}			
	public function upload_art_submitted(){
		Template::render();
	}
	public function upload_art(){
		$this->load->model('art_sub_model');
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');					
			
			if (isset($_POST['save'])){
				$data['member_id']=$members['id'];
				$data['artwork1']=$this->input->post('artwork1');
				$data['artwork2']=$this->input->post('artwork2');
				$data['artwork3']=$this->input->post('artwork3');
				$data['artwork4']=$this->input->post('artwork4');
				$data['artwork5']=$this->input->post('artwork5');		
				
				$this->art_sub_model->submitArtWork($members['id'],$data);		
				redirect('members/upload_art_submitted');
			}
			if ($this->art_sub_model->ifExist($members['id']) ){
				if ($this->art_sub_model->ifApproved($members['id']) ){
					$this->load->library('harnutil');
					$this->load->model('art_medium');
					$this->load->model('art_category');
					$categories=$this->art_category->getAll();					
					$j="";
					foreach ($categories as $category){
						$j.="med_cat[".$category->id."]=[];";
						$mediums=$this->art_medium->getByCategoryID($category->id);						
						foreach($mediums as $medium){		
							$j.="tmp={};";
							$j.="tmp['id']=".$medium->id.";";
							$j.="tmp['name']='".$medium->name."';";
							$j.="med_cat[".$category->id."].push(tmp);";
							//$m[$category->id][]=array('id'=>$medium->id,'name'=>$medium->name);
						}
					}
					
					$select_category=$this->harnutil->dropdownselect("ddlCategory","",'category');
					$select_color=$this->harnutil->dropdownselect("ddlColor","",'color');
					$select_style=$this->harnutil->dropdownselect("ddlStyle","",'style');
					$select_subject=$this->harnutil->dropdownselect("ddlSubject","",'subject');

					Template::set('select_category',$select_category);
					Template::set('select_style',$select_style);
					Template::set('select_subject',$select_subject);
					Template::set('select_color',$select_color);					
					Template::set_view('members/artist/upload_art');
					Assets::add_js( array('vendor/jquery.ui.widget.js','load-image.min.js','canvas-to-blob.min.js','jquery.iframe-transport.js','jquery.fileupload.js',
				'jquery.fileupload-process.js','jquery.fileupload-image.js' ));
					Assets::add_js( "$(function () {
						var med_cat={};
						".$j."
						
					    $('#ddlCategory').change(function(){
					        populateMedium($(this).val());
					    });

						function populateMedium(cat_id){							
							$('#ddlMedium').children().remove();
							if(cat_id){
								tmp=med_cat[cat_id];
								for(var i=0; i<tmp.length; i++){
									$('#ddlMedium').append('<option value='+tmp[i].id+'>'+tmp[i].name+'</option>');	
								}
							}
						}

						
						$('#btnImageUpload').fileupload({
					        dataType: 'json',
					        url:'/members/imageupload',
					        formData:{subdir:'artwork'},   
					        done: function (e, data) {
					        	$(this).hide();			        	
					            $.each(data.result.files, function (index, file) {
					            	thefile=file;			            	
					            });
								$('<img style=\'width:200px;height:150px;\' src=\''+thefile.url+'\'>').appendTo($(this).next());
								$('<a href=\"javascript:void(0)\" class=\"removeimage\"><i class=\"icon-trash\" style=\"vertical-align: text-top; position: absolute;\"></i></a>').appendTo($(this).next());
								//$(this).prev().val(thefile.name);
								$(this).parent().find('input:hidden').val(thefile.name);
								$('label.error').remove();
					        },
					        progressall: function (e, data) {
					            var progress = parseInt(data.loaded / data.total * 100, 10);
					            $('#progress .progress-bar').css(
					                'width',
					                progress + '%'
					            );
					        }			   
					    }).prop('disabled', !$.support.fileInput)
					        .parent().addClass($.support.fileInput ? undefined : 'disabled');			    						
					});", 'inline' );	
				}else{
					if ($this->art_sub_model->ifRejected($members['id']) ){
						Template::set_view('members/upload_art');
					}else{
						Template::set_view('members/upload_art_submitted');
					}
				}
				Template::render();
			}else{			
			Assets::add_css( array('bootstrap.min.css', 'bootstrap-responsive.min.css', 'bootstrap-lightbox.css','style.css','jquery.fileupload.css'));			
			Assets::add_js( array('vendor/jquery.ui.widget.js','load-image.min.js','canvas-to-blob.min.js','jquery.iframe-transport.js','jquery.fileupload.js',			
				'jquery.fileupload-process.js','jquery.fileupload-image.js' ));
			Assets::add_module_js('members', 'artist_approval_submission.js');
			Template::render();
			}
		}else
			redirect('/');
	}

	public function my_art()	{
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			Template::set('members',$members);
			Template::render();
		}else
			redirect('/');
	}
	public function sales()	{
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			Template::set('members',$members);
			Template::render();
		}else
			redirect('/');
	}
	public function account_info_profile()	{
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			Template::set('members',$members);
			Template::render();
		}else
			redirect('/');
	}			

	public function register_member(){
		$this->load->helper('date');
		$this->load->config('address');
		$this->load->helper('address');		
		$json=array("status"=>0,"message"=>"Error");
		//if (isset($_POST['register'])){
			//TODO do more checks here
			$data = array(
				'email'			=> $this->input->post('email'),
				'pswd'			=> md5($this->input->post('password')),
				'firstname'		=> $this->input->post('firstname'),
				'lastname'		=> $this->input->post('lastname')
			);		
			$userdata=$this->members_model->find_by("email",$this->input->post('email'));
			if($userdata){
				$json=array("status"=>0,"message"=>"Email already exist");
			}else{
				if ($this->db->insert('members', $data)){
					//$userdata=$this->members_model->find_by("email",$this->input->post('email'));
					//$this->setSession($userdata);		
					$this->sendnewregistrationemail($this->input->post('firstname'),$this->input->post('email'),md5($this->input->post('password')));
					$json=array("status"=>1);
				}else{
					$json=array("status"=>0,"message"=>"Error");
				}				
			}
			
			
		//}
			echo json_encode($json);
	}

	public function registration(){
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			$userdata=$this->members_model->find_by('id',$members['id']);
			
			$members['dob']=$userdata->dob;
			$members['country']=$userdata->country;
			$members['address1']=$userdata->address1;
			$members['address2']=$userdata->address2;
			$members['phone']=$userdata->phone;
			$members['city']=$userdata->city;
			$members['postal']=$userdata->postal;
			$members['type']=$userdata->type;
			$members['commission']=$userdata->commission;
			$members['about']=$userdata->about;
			$members['photo']=$userdata->photo;			 
			if($members['dob']){
				$d=substr($members['dob'],8,2);
				$m=substr($members['dob'],5,2);
				$y=substr($members['dob'],0,4);
				$dob=$d."-".$m."-".$y;
			}else {
				$dob='01-01-1990';
			}
			Template::set('dob',$dob);
			Template::set('members',$members);

			if (isset($_POST['save'])){
				if ($insert_id = $this->save_members($members['id'])){
					if($member['type']==1)
						redirect('members/upload_art');
					else
						redirect('members/favourite_art');
				}else{
					Template::set_message(lang('members_create_failure') . $this->members_model->error, 'error');
				}
			}
			$this->load->helper('address_helper');			
			Assets::add_css( array('bootstrap-formhelpers.min.css','datepicker.css'));
			Assets::add_js( array('bootstrap-datepicker.js','bootstrap-formhelpers.min.js'));
			Assets::add_js( array('vendor/jquery.ui.widget.js','load-image.min.js','canvas-to-blob.min.js','jquery.iframe-transport.js','jquery.fileupload.js',
				'jquery.fileupload-process.js','jquery.fileupload-image.js' ));
			Assets::add_module_js('members', 'registration.js');			
			Template::render();
			
		}else{
			redirect('/');
		}
	}

	/**
	 * Summary
	 *
	 * @param String $type Either "insert" or "update"
	 * @param Int	 $id	The ID of the record to update, ignored on inserts
	 *
	 * @return Mixed    An INT id for successful inserts, TRUE for successful updates, else FALSE
	 */
	private function save_members($id){
		$data = array();
		$tmp = $this->input->post('members_dob');
		$d=substr($tmp, 0,2);
		$m=substr($tmp, 4,2);
		$y=substr($tmp, 6,4);
		$data['dob']=$y."-".$m."-".$d;
		$data['country']        = $this->input->post('members_country');
		$data['address1']        = $this->input->post('members_address1');
		$data['address2']        = $this->input->post('members_address2');
		$data['phone']        = $this->input->post('members_phone');
		$data['city']        = $this->input->post('members_city');
		$data['postal']        = $this->input->post('members_postal');
		$data['type']        = $this->input->post('members_type');
		$data['commission']   = $this->input->post('members_commision');
		$data['about'] 	= $this->input->post('members_about');
		$data['photo'] 	= $this->input->post('members_photo');

		$this->db->where('id', $id);
		$this->db->update('members', $data); 
		$userdata=$this->members_model->find_by('id',$id);
		$this->setSession($userdata);
		return true;
	}	

}