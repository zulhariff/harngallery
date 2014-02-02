<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class artist extends Front_Controller{
	var $userdata;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();							
		$this->load->model('members_model', null, true);
		$this->lang->load('members');
		Assets::add_js( array('jquery-1.7.2.min.js', 'jquery.validate.js','bootstrap.min.js' ,'jquery.masonry.min.js','scripts.js' ));
		Assets::add_css( array('bootstrap.min.css', 'bootstrap-responsive.css', 'bootstrap-lightbox.css','style.css'));
	}
	private function checkLogged(){
		$userdata=$this->session->userdata('members_loggedin');
		if(!$userdata)
			if($userdata->type!=1)
				redirect('members/artist/login');
	}
	public function index(){
		$userdata=$this->session->userdata('members_loggedin');
		if(!$userdata)
			if($userdata->type!=1)
				redirect('members/artist/login');
		Template::render();	
	}

	public function login(){	
		$this->load->helper('form');
		$this->load->library('form_validation');		
		Template::render();	
	}
	public function add_curator(){
		Template::set_view('members/artist/add_curator');
		Template::render();
	}
	public function addCurator($artwork_id){		
		if (preg_match('~^(?:.+[.])?paypal[.]com$~', gethostbyaddr($_SERVER['REMOTE_ADDR'])) > 0){
			$this->load->model('artwork_model');
			//$artwork_id=$this->input->post('artwork_id');
			$data['curatorFlag']=1;			
			$this->artwork_model->update($artwork_id,$data);
			$this->sendCuratorEmail($artwork_id);			
		}
	}
	private function sendCuratorEmail($artwork_id){
		$userdata=$this->session->userdata('members_loggedin');		
		$subject="Curator";
		$to=$this->config->item('admin_email');
		$template="curator";
		$data['link']="http://www.harngallery.com/members/profile/item/".$artwork_id;
		$data['firstname']=$userdata['firstname'];
		$data['lastname']=$userdata['lastname'];
		$data['email']=$userdata['email'];
		$data['artwork_id']=$artwork_id;
		$this->sendEmail($subject,$to,$template,$data);
	}
	private function sendEmail($subject,$to,$template,$data){
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->from('info@harngallery.com', 'Harn Gallery');		
		$this->email->to($to); 		
		$this->email->subject($subject);
		$message = $this->load->view("email/".$template,$data,TRUE); 	
		$this->email->message($message);
		$this->email->send();
	}
	public function edit_art($artwork_id){
		$this->load->helper('form');
		$this->load->model('artwork_model');
		$artwork=$this->artwork_model->find($artwork_id);		
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
			}
		}
					
		$select_category=$this->harnutil->dropdownselect("ddlCategory","",'category',$artwork->cat_id);
		$select_color=$this->harnutil->dropdownselect("ddlColor","",'color',$artwork->color_id);
		$select_style=$this->harnutil->dropdownselect("ddlStyle","",'style',$artwork->style_id);
		$select_subject=$this->harnutil->dropdownselect("ddlSubject","",'subject',$artwork->subject_id);
		$select_orientation=$this->harnutil->dropdownselect("ddlOrientation","",'orientation',$artwork->orientation_id);
		Template::set('artwork',$artwork);
		Template::set('select_orientation',$select_orientation);	
		Template::set('select_category',$select_category);
		Template::set('select_style',$select_style);
		Template::set('select_subject',$select_subject);
		Template::set('select_color',$select_color);	

		

		Template::set_view('members/artist/edit_art');
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
				medium_id=$('#txtMedium').val();					
				$('#ddlMedium').children().remove();
				$('#ddlMedium').append('<option>Please select</option>');
				if(cat_id){
					tmp=med_cat[cat_id];
					for(var i=0; i<tmp.length; i++){
						$('#ddlMedium').append('<option value='+tmp[i].id+' '+((medium_id==tmp[i].id)?'selected':'')+'>'+tmp[i].name+'</option>');	
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
		    $('#ddlCategory').trigger('change');		    						
		});
		", 'inline' );	
		Template::render();	
	}	
	public function edit_art_save($artwork_id){
		$this->load->model('artwork_model');
		$userdata=$this->session->userdata('members_loggedin');
		$artwork=$this->artwork_model->find($artwork_id);	
		
		if($artwork->user_id==$userdata['id']){
		if (isset($_POST['save'])){
			$data['title']=$this->input->post('txttitle');
			$data['description']=$this->input->post('txtdescription');
			$tmp = $this->input->post('txtdatecreated');
			$d=substr($tmp, 0,2);
			$m=substr($tmp, 4,2);
			$y=substr($tmp, 6,4);
			$data['created']=$y."-".$m."-".$d;
			$data['user_id']=$userdata['id'];
			$data['cat_id']=$this->input->post('ddlCategory');
			$data['medium_id']=$this->input->post('txtMedium');
			$data['style_id']=$this->input->post('ddlStyle');
			$data['subject_id']=$this->input->post('ddlSubject');
			$data['color_id']=$this->input->post('ddlColor');
			$data['height']=$this->input->post('dimension_h');
			$data['width']=$this->input->post('dimension_w');
			$data['dimension_unit']=$this->input->post('dimension_unit');
			if($data['dimension_unit']==2){
				$dm=2.54;
			}else{
				$dm=1;
			}
			$area=($data['height'] * $dm) * ($data['width']*$dm);
			$data['area']=$area;
			$data['framing']=$this->input->post('chkFrame')=='on'?0:1;
			$data['price']=$this->input->post('txtprice');
			$data['keywords']=$this->input->post('txtkeyword');			
			$data['uploaded']=date('Y-m-d H:i:s');
			$data['orientation_id']=$this->input->post('ddlOrientation');
			$curator=false;
			if($this->input->post('chkCurator'))					
				$curator=true;					
				$this->artwork_model->update($artwork_id,$data);		
				$l="http://harngallery.com/members/profile/item/".$artwork_id;
				$link="<a href='".$l."'>".$l."</a>";
				/*
				$this->load->model("messages_model");
				$msg_obj=$this->load->messages_model->find_by('name','new_artwork_uploaded');
				$message=$msg_obj->message;
				$message = str_replace("{link}", $link , $message);
				*/
				$message="Artwork saved.";
				$this->config->load('paypal');
				$config['paypal_url']=$this->config->item('paypal_url');
				$config['hosted_button_id']=$this->config->item('hosted_button_id');
				Template::set('config',$config);
				Template::set('message',$message);
				Template::set('link', $link);
				Template::set('curator', $curator);
				Template::set('artwork_id', $artwork_id);
				Template::set_view('members/artist/upload_art_submitted');
				Template::render();
		}else{
			redirect('/members/artist/edit_art');
		}	
		}
	}
	public function upload_art(){
		$this->load->model('artwork_model');
		$userdata=$this->session->userdata('members_loggedin');
		if (isset($_POST['save'])){
			$data['image']=$this->input->post('image');
			$data['title']=$this->input->post('txttitle');
			$data['description']=$this->input->post('txtdescription');
			$tmp = $this->input->post('txtdatecreated');
			$d=substr($tmp, 0,2);
			$m=substr($tmp, 4,2);
			$y=substr($tmp, 6,4);
			$data['created']=$y."-".$m."-".$d;
			$data['user_id']=$userdata['id'];
			$data['cat_id']=$this->input->post('ddlCategory');
			$data['medium_id']=$this->input->post('txtMedium');
			$data['style_id']=$this->input->post('ddlStyle');
			$data['subject_id']=$this->input->post('ddlSubject');
			$data['color_id']=$this->input->post('ddlColor');
			$data['height']=$this->input->post('dimension_h');
			$data['width']=$this->input->post('dimension_w');
			$data['dimension_unit']=$this->input->post('dimension_unit');
			if($data['dimension_unit']==2){
				$dm=2.54;
			}else{
				$dm=1;
			}
			$area=($data['height'] * $dm) * ($data['width']*$dm);
			$data['area']=$area;
			$data['framing']=$this->input->post('chkFrame')=='on'?0:1;
			$data['price']=$this->input->post('txtprice');
			$data['keywords']=$this->input->post('txtkeyword');			
			$data['uploaded']=date('Y-m-d H:i:s');
			$data['orientation_id']=$this->input->post('ddlOrientation');
			$curator=false;
			if($this->input->post('chkCurator'))					
				$curator=true;					
				$artwork_id = $this->artwork_model->insert($data);		
				//$link=$this->config->item('upload_url').$userdata['id']."/artwork/".$data['image'];
				$l="http://harngallery.com/members/profile/item/".$artwork_id;
				$link="<a href='".$l."'>".$l."</a>";
				$this->load->model("messages_model");
				$msg_obj=$this->load->messages_model->find_by('name','new_artwork_uploaded');
				$message=$msg_obj->message;
				$message = str_replace("{link}", $link , $message);
				$this->config->load('paypal');
				$config['paypal_url']=$this->config->item('paypal_url');
				$config['hosted_button_id']=$this->config->item('hosted_button_id');
				Template::set('config',$config);
				Template::set('message',$message);
				Template::set('link', $link);
				Template::set('curator', $curator);
				Template::set('artwork_id', $artwork_id);
				Template::set_view('members/artist/upload_art_submitted');
				Template::render();
		}else{
			redirect('/members/upload_art');
		}		
	}

	public function artsubm(){
		/*
		$userdata=$this->session->userdata('members_loggedin');
		if(!$userdata)
			if($userdata->type!=1)
				redirect('members/artist/login');
		if (isset($_POST['save'])){
		$data['artwork1']=$this->input->post('artwork1');
		$data['artwork2']=$this->input->post('artwork2');
		$data['artwork3']=$this->input->post('artwork3');
		$data['artwork4']=$this->input->post('artwork4');
		$data['artwork5']=$this->input->post('artwork5');
		*/
	}
}