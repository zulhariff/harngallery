<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class members extends Front_Controller{
	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct(){
		parent::__construct();
		$this->key_value = "9r3ealms"; 
		$this->load->helper('form');
		$this->load->library('form_validation');	
		$this->load->model('members_model');
		$this->lang->load('members');	
		
		Assets::add_js( array('jquery-1.7.2.min.js', 'jquery.validate.js','bootstrap.min.js' ,'jquery.masonry.min.js','scripts.js' ));
		Assets::add_css( array('bootstrap.min.css', 'bootstrap-responsive.css', 'bootstrap-lightbox.css','style.css'));
	}

	public function imageupload(){
		$members=$this->session->userdata('members_loggedin');
		$subdir=$this->input->post('subdir');
		if($subdir=="")
			$subdir="temp";			
		if($members){
			$subdir_options=$members['id']."/".$subdir."/";
		}else{
			$subdir_options="/".$subdir."/";
		}
		$upload_dir=$this->config->item('upload_dir').$subdir_options;
		$upload_url=$this->config->item('upload_url').$subdir_options;
		$options=array('upload_dir'=>$upload_dir,'upload_url'=>$upload_url);
		$this->load->library('UploadHandler',$options);
	}

	/**
	 * Displays a list of form data.
	 *
	 * @return void
	 */
	public function index(){
		//$records = $this->members_model->find_all();
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			if($members['type']==1){
				$this->load->model('art_sub_model');
				if ($this->art_sub_model->ifApproved($members['id']))
					redirect('members/favourite_art');
				redirect('members/upload_art');				
			}else
				redirect('members/favourite_art');
		}else{
			redirect('/');
		}
	}


	public function login(){
		$this->load->model("memberlogin","login");
		$userdata=$this->login->verifylogin($this->input->post('email'), md5($this->input->post('password')),1);
		$json=array("status"=>0,"message"=>"Error");

			if($userdata){
				if($userdata->ban){
					$json=array("status"=>0,"message"=>"Sorry, your account has been suspended. Please contact us for more details");
				}else{
					$this->setSession($userdata);			
					$json=array("status"=>1);			
				}
			}else{
				$json=array("status"=>0,"message"=>"Login failed. Invalid username or password");
			}		

		echo json_encode($json);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}


	private function populateMemberData($member,$userdata){
		$member['id']=$userdata->id;
	}
	public function resetPassword($token){
		$userdata=$this->members_model->find_by("token",$token);
		if($userdata){
			$this->load->library('email');
			$this->email->set_mailtype("html");
			$this->email->from('info@harngallery.com', 'Harn Gallery');
			$this->email->to($userdata->email); 
		
			$this->email->subject('Forget Password');			
			$data['email']=$userdata->email;
			$data['firstname']=$userdata->firstname;
			$data['lastname']=$userdata->lastname;			
			$length = 10;

			$data['password'] = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

			$d['pswd']=md5($data['password']);
			$this->db->where('id', $userdata->id);
			$this->db->update('bf_members', $d); 

			$message = $this->load->view('forget_password',$data,TRUE); 
			$this->email->message($message);
			$this->email->send();			
			Template::set('message','An email with your reset password has been sent to your email address');
		}else{
			Template::set('message','No record found.');
		}
		Template::render();
	}
	private function sendForgetPasswordRequest($email){
		$userdata=$this->members_model->find_by("email",$this->input->post('email'));
		if($userdata){
			$this->load->library('email');
			$this->email->set_mailtype("html");
			$this->email->from('info@harngallery.com', 'Harn Gallery');
			$this->email->to($email); 
		
			$this->email->subject('Password Reset Request');
			$data['email']=$userdata->email;
			$data['firstname']=$userdata->firstname;
			$data['lastname']=$userdata->lastname;	
			$token=$userdata->token;
			$link='http://www.harngallery.com/members/resetPassword/'.$token;
			$data['link']='<a href="'.$link.'">'.$link.'</a>';
			$message = $this->load->view('forget_password_request',$data,TRUE); 
			$this->email->message($message);
			$this->email->send();			
		}
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
			$this->db->update('bf_members', $d); 

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
				//$this->sendForgetPasswordEmail($userdata->email);
				$this->sendForgetPasswordRequest($userdata->email);
				
				$message="An email has been sent to your email address.";	
			}else{
				$message="No record found";
			}
		}else{
			$message="Please enter your email address below, and we will send you an email with a link to reset your password.";
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
			Template::set('title','Favourite Art');
			$this->load->model("favouriteart_model");
			$list=$this->favouriteart_model->find_by('member_id',$members['id']);	
			Template::set('list',$list);		
			Template::set('members',$members);
			Assets::add_js( "$(function () {	
				loadfav_art()
				})", 'inline' );	
			Template::render();
		}else
			redirect('/');
	}
	public function addFavouriteArt($arwork_id){
		$members=$this->session->userdata('members_loggedin');
		if(!$members)
			redirect('/');		
		$this->load->model("favouriteart_model");
		$this->load->favouriteart_model->add($members['id'],$arwork_id);
		//redirect('/members/favourite_artists');
	}	
	public function deleteFavouriteArt($arwork_id){
		$members=$this->session->userdata('members_loggedin');
		if(!$members)
			redirect('/');		
		$this->load->model("favouriteart_model");
		$this->load->favouriteart_model->delete($members['id'],$arwork_id);
		//redirect('/members/favourite_artists');
	}		
	public function favourite_artists()	{
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			$this->load->model("favouriteartist_model");
			$list=$this->favouriteartist_model->find_by('member_id',$members['id']);
			Template::set('title','Favourite Artists');
			Template::set('list',$list);
			Template::set('members',$members);
			Assets::add_js( "$(function () {	
				loadfav_artist();
				})", 'inline' );				
			Template::render();			
		}else
			redirect('/');
	}
	public function addFavouriteArtist($artist_id){
		$members=$this->session->userdata('members_loggedin');
		if(!$members)
			redirect('/');		
		$this->load->model("favouriteartist_model");
		$this->load->favouriteartist_model->add($members['id'],$artist_id);
		//redirect('/members/favourite_artists');
	}	
	public function deleteFavouriteArtist($artist_id){
		$members=$this->session->userdata('members_loggedin');
		if(!$members)
			redirect('/');		
		$this->load->model("favouriteartist_model");
		$this->load->favouriteartist_model->delete($members['id'],$artist_id);
		//redirect('/members/favourite_artists');
	}		
	public function orders()	{
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			$this->load->model("orders_model");
			$orders=$this->orders_model->getPurchase($members['id']);
			Template::set('orders',$orders);		
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
	
	private function firstSubmission(){
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
					
					$select_category=$this->harnutil->dropdownselect("ddlCategory","",'category','');
					$select_color=$this->harnutil->dropdownselect("ddlColor","",'color','');
					$select_style=$this->harnutil->dropdownselect("ddlStyle","",'style','');
					$select_subject=$this->harnutil->dropdownselect("ddlSubject","",'subject','');
					$select_orientation=$this->harnutil->dropdownselect("ddlOrientation","",'orientation','');
					Template::set('select_orientation',$select_orientation);	

					Template::set('select_category',$select_category);
					Template::set('select_style',$select_style);
					Template::set('select_subject',$select_subject);
					Template::set('select_color',$select_color);	

					

					Template::set_view('members/artist/upload_art');
					Template::set('title','Upload Art');
					Assets::add_css( array('bootstrap-formhelpers.min.css','datepicker.css'));
					Assets::add_js( array('bootstrap-datepicker.js','bootstrap-formhelpers.min.js'));
					Assets::add_js( array('vendor/jquery.ui.widget.js','load-image.min.js','canvas-to-blob.min.js','jquery.iframe-transport.js','jquery.fileupload.js',
					'jquery.fileupload-process.js','jquery.fileupload-image.js' ));					
					Assets::add_js( "
					var med_cat={};
					".$j.";", 'inline' );	
					//Assets::add_module_js('members', 'upload_art.js');
					Assets::add_js( "$(function () {	
					$.validator.addMethod('UKDate',function(value, element) {	
						str=value;
						var m = str.match(/^(\d{1,2})-(\d{1,2})-(\d{4})$/);
  						return (m) ? new Date(m[3], m[2]-1, m[1]) : null;
					});	
			        	$('#artistUploadForm').validate({
								debug : true,
								ignore: [],
								rules: {
								image:'required',
								txttitle: 'required',
								txtdatecreated : { UKDate : true },
								ddlCategory : 'required',
								ddlMedium : 'required',
								ddlStyle : 'required',
								ddlSubject : 'required',
								dimension_h : 'required',
								dimension_w : 'required',
								txtprice : 'required',
								ddlColor : 'required',
								ddlOrientation : 'required',
								chkCopy: 'required',
								chkOri: 'required',
								chkTerms : 'required'
						},
						messages: {
							txtdatecreated : 'Please enter a valid date'
						},
							submitHandler: function(form) {  
								if ($(form).valid()) 		
									form.submit(); 		
									return false;
								} 
							});	 						
						$('.datepicker').datepicker();												
					    $('#ddlCategory').change(function(){
					        populateMedium($(this).val());
					    });

						$('#ddlMedium').change(function(){
							$('#txtMedium').val($(this).val());
						});

						function populateMedium(cat_id){							
							$('#ddlMedium').children().remove();
							$('#ddlMedium').append('<option>Please select</option>');
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
					        submit: function(e,data){
					        	$(this).hide();			        	
					        	$('<div style=\'width:130px\' class=\'load\'><div class=\'loader-bert\'></div></div>').appendTo($(this).next());
					        },
					        done: function (e, data) {					        	
					        	
					            $.each(data.result.files, function (index, file) {
					            	thefile=file;			            	
					            });
								$('.load').remove();
								$('<img style=\'height:150px;\' src=\''+thefile.url+'\'>').appendTo($(this).next());
								$('<a href=\"javascript:void(0)\" class=\"removeimage\" style=\"display:block;\">Remove</a>').appendTo($(this).next());
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
					    		    						
					});
					", 'inline' );	
					Template::render();		
	}
	public function upload_art(){
		Template::set('title','Upload Art');
		$this->load->model('art_sub_model');
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');			
			if($members['type']==2){
				redirect('/members');
			}		
			Template::set('members',$members);
			if (isset($_POST['save'])){
				$data['member_id']=$members['id'];
				$data['artwork1']=$this->input->post('artwork1');
				$data['artwork2']=$this->input->post('artwork2');
				$data['artwork3']=$this->input->post('artwork3');
				$data['artwork4']=$this->input->post('artwork4');
				$data['artwork5']=$this->input->post('artwork5');		
				
				$this->art_sub_model->submitArtWork($members['id'],$data);		
				Template::set_view('members/art_submission/upload_art_submitted');
				Template::render();
			}
			if ($this->art_sub_model->ifExist($members['id']) ){
				if ($this->art_sub_model->ifApproved($members['id']) ){
					$this->firstSubmission();
				}else{										
					if ($this->art_sub_model->ifPending($members['id']) ){
						Template::set_view('members/art_submission/upload_art_submitted');
						Template::render();
					}
					if ($this->art_sub_model->getNoOfSubmission($members['id']) > 3){
						Template::set_view('members/art_submission/upload_art_max');
						Template::render();
					}
				}				
			}
			Assets::add_css( array('bootstrap.min.css', 'bootstrap-responsive.css', 'bootstrap-lightbox.css','style.css','jquery.fileupload.css'));			
			Assets::add_js( array('vendor/jquery.ui.widget.js','load-image.min.js','canvas-to-blob.min.js','jquery.iframe-transport.js','jquery.fileupload.js',			
				'jquery.fileupload-process.js','jquery.fileupload-image.js' ));
			Assets::add_module_js('members', 'artist_approval_submission.js');
			Template::render();			
		}else
			redirect('/');
	}

	public function my_art()	{
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			Template::set('title','My Art');
			Template::set('members',$members);
			Assets::add_js( "$(function () {	
				loadloader();
				ajaxArtwork('myart',1);
			});", 'inline' );		
			Template::render();
		}else
			redirect('/');
	}
	public function sales()	{
		if($this->session->userdata('members_loggedin')){
			Template::set('title','Sales');
			$members=$this->session->userdata('members_loggedin');
			$this->load->model("orders_model");
			$sales=$this->orders_model->getSalesByArtist($members['id']);
			Template::set('sales',$sales);		
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
		$token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 16);
		if (isset($_POST['firstname'])){
			$data = array(
				'email'			=> strtolower($this->input->post('email')),
				'pswd'			=> md5($this->input->post('password')),
				'firstname'		=> $this->input->post('firstname'),
				'lastname'		=> $this->input->post('lastname'),
				'token'			=> $token,
				'reg_date1'		=> date("Y-m-d H:i:s")
			);		
			$email=$this->input->post('email');
			$email=trim($this->input->post('email'));
			$userdata=$this->members_model->find_by("email",$email);						
			$firstname=trim($this->input->post('firstname'));
			if($userdata){
				$json=array("status"=>0,"message"=>"Email already exist");
			}else{	
				$word = $this->session->userdata('captchaWord');
				$captcha_input=$this->input->post('txtCaptcha');
				if($captcha_input==$word){				
					if ($this->db->insert('bf_members', $data)){
						$this->sendnewregistrationemail($token,$email,$firstname);
						$json=array("status"=>1);
					}else{
						$json=array("status"=>0,"message"=>"Error");
					}				
				}else{
					$json=array("status"=>0,"message"=>"Wrong Code");
				}						
			}						
		}
		echo json_encode($json);
	}
	private function sendnewregistrationemail($token,$email,$name){
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->from($this->config->item('email_support'), $this->config->item('website_name'));
		$this->email->to($email); 	
		$this->email->subject('New Account Confirmation');
		$encrypted_text = mcrypt_ecb(MCRYPT_DES, $this->key_value, $email, MCRYPT_ENCRYPT); 						
		$encrypted_text=urlencode( base64_encode ($encrypted_text));				
		$link="http://www.harngallery.com/verify_registration?t=".$token."&e=".$encrypted_text;		
		/*
		$data['email']=$email;
		$data['firstname']=$name;
		$data['token']=$token;
		*/
		$link='<a href="'.$link.'">'.$link.'</a>';
		
		//$message = $this->load->view('new_registration',$data,TRUE); ]
		$this->load->model("messages_model");
		$msg_obj=$this->load->messages_model->find_by('name','registration_activation');
		$message=$msg_obj->message;
		$message = str_replace("{firstname}", $name , $message);
		$message = str_replace("{link}", $link , $message);
		$this->email->message($message);
		$this->email->send();
	}
	public function test(){
		$this->load->model("messages_model");
		$msg_obj=$this->load->messages_model->find_by('name','registration_activation');
		$message=$msg_obj->message;
		$message = str_replace("{firstname}", "Zulkarnain", $message);
		var_dump($message);
	}
	public function verify_registration(){		
		$t=$_GET['t'];		
		$e=$_GET['e'];
		$this->load->model("memberlogin","login");
		if(!$t || !$e){			
			Template::set_view('error');
			Template::set_message('error_message','Invalid Page');
			Template::render();
		}else{;
			//$e=urldecode($e);
			$e=base64_decode($e);		
			$e = mcrypt_ecb(MCRYPT_DES, $this->key_value, $e, MCRYPT_DECRYPT);
			$email=trim($e);
			$userdata=$this->login->verifytoken($email, $t);
			if($userdata){
				$data['verified']=1;
				$this->db->where('id', $userdata->id);
				$this->db->update('bf_members', $data); 
				
				$this->setSession($userdata);
				redirect('registration');				
			}else{
				Template::set_view('error');
				Template::set_message('error_message','Invalid Page');
				Template::render();
			}
		}
	}	

	public function getIIA($start=0){		
		$this->load->model("members_model");
		$this->load->library('pagination');
		$config['base_url'] = '/members/getIIA/';
		$config['total_rows'] = count($this->members_model->getIIA());
		$config['per_page'] = 6;
		$end=$config['per_page'];

		$artists=$this->members_model->getIIA("id","asc",$start,$end);
		$this->pagination->initialize($config);
		$data['artists']=$artists;
		$data['links']=$this->pagination->create_links();
		$this->load->library('pagination');		
		$this->load->view("members/iia",$data);			
	}
	public function purchase(){
		Template::render();
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
						redirect('members/');
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
	public function browseart_search($start=0){
		$members=$this->session->userdata('members_loggedin');
		$f_art=array();
		if($members){	
			$logged_in=true;		
			$this->load->model("favouriteart_model");
			$favouriteart=$this->favouriteart_model->find_all_by('member_id',$members['id']);	
			if($favouriteart){
			foreach ($favouriteart as $art) {
				array_push($f_art,$art->artwork_id);
			}
			}
		}else{
			$logged_in=false;
			$favouriteart=null;
		}
		$category = $this->input->post('category');
		$price = $this->input->post('price');
		$medium = $this->input->post('medium');
		$orientation = $this->input->post('orientation');
		$style = $this->input->post('style');
		$subject = $this->input->post('subject');
		$size = $this->input->post('size');
		$color = $this->input->post('color');
		$location = $this->input->post('loc');
		$sortType=$this->input->post('sortType');
		$searchStr=$this->input->post('searchStr');
		$data['search']['category']=$category;
		$data['search']['price']=$price;
		$data['search']['medium']=$medium;
		$data['search']['orientation']=$orientation;
		$data['search']['style']=$style;
		$data['search']['subject']=$subject;
		$data['search']['size']=$size;
		$data['search']['color']=$color;
		$data['search']['location']=$location;
		$data['search']['sortType']=$sortType;
		$data['search']['searchStr']=$searchStr;
		$this->updatesortarrangement();
		if($sortType){
			switch ($sortType) {
			case 1:
				$sort_by="sort";
				$ad="asc";
				break;
			case 2:
				$sort_by="price";
				$ad="asc";
				break;
			case 3:
				$sort_by="price";
				$ad="desc";
				break;
			case 4:
				$sort_by="area";
				$ad="asc";
				break;
			case 5:
				$sort_by="area";
				$ad="desc";
				break;		
			case 6:
				$sort_by="visits";
				$ad="desc";
				break;	
			default:
				$sortType=1;
				$sort_by="sort";
				$ad="asc";
				break;
			}
		
		}else{
			/*
			$sort_by="id";
			$ad="desc";
			*/
			$sort_by="sort";
			$ad="asc";
		}		
		//echo "c=".$category." p=".$price." m=".$medium." o=".$orientation." s=".$style." su=".$subject." sz=".$size." c=".$color." l=".$location." srch=".$searchStr;
		$this->load->model("artwork_model");
		$this->load->library('pagination');
		$config['base_url'] = '/members/browseart_search';
		$config['total_rows'] = count($artworks=$this->artwork_model->browseArtSearch($category,$price,$medium,$orientation,$style,$subject,$size,$color,$location,$searchStr,$sort_by,$ad));
		$config['per_page'] = 30;
		$config['uri_segment'] = 3;
		$end=$config['per_page'];
		$artworks=$this->artwork_model->browseArtSearch($category,$price,$medium,$orientation,$style,$subject,$size,$color,$location,$searchStr,$sort_by,$ad,$start,$end);		
		$this->pagination->initialize($config);
		$data['artworks']=$artworks;
		$this->pagination->initialize($config);
		$data['artworks']=$artworks;
		$data['links']=$this->pagination->create_links();
		$data['totalArtworks']=$config['total_rows'];
		//$this->load->view("members/search",$data);
		$data['f_art']=$f_art;
		$data['logged_in']=$logged_in;
		$this->load->view("members/profile/artworks",$data);			
		
	}
	private function updatesortarrangement(){
		$i=0;
		$this->load->model("members/artwork_model");
		$artist_sorted=$this->load->artwork_model->getUserSortOrder();
		$as=array();
		foreach ($artist_sorted as $ar) {
			array_push($as,$ar->id);
		}
		$artwork_all=$this->load->artwork_model->getAll();
		$total_artwork=count($artwork_all);		
		$data['sort']=0;
		$this->db->update('bf_artwork', $data);
		while ($i <= $total_artwork-1) {
			foreach ($as as $k => $v) {
				if ($i >= $total_artwork)
        			continue;
				$getUnsorted=$this->load->artwork_model->getByArtistNoSort($v);				
				if(count($getUnsorted)){
					$i++;
					$data['sort']=$i;
					$this->artwork_model->update($getUnsorted[0]->id, $data);	
				}else{
					unset($as[$k]);
				}				
			}			
		}
	}	
	public function search($start=0){
		$members=$this->session->userdata('members_loggedin');
		$f_art=array();
		if($members){	
			$logged_in=true;		
			$this->load->model("favouriteart_model");
			$favouriteart=$this->favouriteart_model->find_all_by('member_id',$members['id']);	
			if($favouriteart){
			foreach ($favouriteart as $art) {
				array_push($f_art,$art->artwork_id);
			}
			}
		}else{
			$logged_in=false;
			$favouriteart=null;
		}
		$searchStr=$this->input->post('searchStr');
		$this->load->model("artwork_model");
		$this->load->library('pagination');
		$config['base_url'] = '/members/search';
		$config['total_rows'] = count($this->artwork_model->search($searchStr));
		$config['per_page'] = 6;
		$end=$config['per_page'];

		$artworks=$this->artwork_model->search($searchStr,$start,$end);
		$this->pagination->initialize($config);
		$data['artworks']=$artworks;
		$this->pagination->initialize($config);
		$data['artworks']=$artworks;
		$data['links']=$this->pagination->create_links();
		$data['totalArtworks']=$config['total_rows'];
		//$this->load->view("members/search",$data);
		$data['f_art']=$f_art;
		$data['logged_in']=$logged_in;
		$this->load->view("members/profile/artworks",$data);		
	}
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
		$data['ship_type'] 	= $this->input->post('members_ship');
		$data['reg_date2'] = date("Y-m-d H:i:s");
		$this->db->where('id', $id);
		$this->db->update('bf_members', $data); 
		$userdata=$this->members_model->find_by('id',$id);
		$this->setSession($userdata);
		return true;
	}	

}