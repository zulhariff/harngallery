<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin extends Front_Controller{

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct(){
		parent::__construct();
		Template::set_theme('webadmin');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('members_model', null, true);
		$this->lang->load('members');
		Assets::add_css( array('bootstrap.min.css','style.css','font-awesome.min.css'));		
		
		$admin_loggedin=$this->session->userdata('admin_loggedin');
		if(!$admin_loggedin){
			redirect('/members/admin_login');
		}
		
	}
	public function index(){		
		redirect('/members/admin/artwork');
	}
	public function add_curator($id){
		$this->load->model('curator_model');
		$curator=$this->curator_model->find_by("artwork_id",$id);
		if (isset($_POST['save'])){			
			$data['artwork_id']=$id;
			$data['review']=$this->input->post('curator_review');
			$data['photo']=$this->input->post('curatorImage');
			$data['on_flag']=$this->input->post('on_flag');
			if($curator){
				$this->curator_model->update($curator->id,$data);
			}else{
				$this->curator_model->insert($data);				
			}
			$curator=$this->curator_model->find_by("artwork_id",$id);
		}
		Template::set('curator',$curator);
		Assets::add_js( array('vendor/jquery.ui.widget.js','load-image.min.js','canvas-to-blob.min.js','jquery.iframe-transport.js','jquery.fileupload.js',
				'jquery.fileupload-process.js','jquery.fileupload-image.js' ));		
		Assets::add_js( array('tinymce/tinymce.min.js'));
		Assets::add_js( 
			"$(function (){
				tinymce.init({
				selector: 'textarea',
				plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen',
				'insertdatetime media table contextmenu paste jbimages'
				],
				toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages',
				relative_urls: false
				});
				$('.removeimage').live( 'click', function(){					
					$(this).parent().prev().show();
					$(this).parent().children().remove();
				});	
				$('.btnImageUpload').fileupload({
					dataType: 'json',
					url:'/members/admin/imageupload/curator',
					done: function (e, data) {
						$(this).hide();			        	
						$.each(data.result.files, function (index, file) {
							thefile=file;			            	
						});
						$('<img style=\'width:200px;height:150px;\' src=\''+thefile.url+'\'>').appendTo($(this).next());
						$('<a href=\"javascript:void(0)\" class=\"removeimage\"><i class=\"icon-trash\" style=\"vertical-align: text-top; position: absolute;\"></i></a>').appendTo($(this).next());
						$(this).parent().find('input:hidden').val(thefile.name);
						$('label.error').remove();
					}
				});
			});", 'inline' 
		);		
		Template::render();
	}

	public function artsubmission($type='approved',$sort_by="created",$ad="desc",$start=0){
		$this->load->model('art_sub_model');
		$this->load->library('pagination');									
		$config['base_url'] = '/members/admin/artsubmission/'.$type.'/'.$sort_by.'/'.$ad;
		$config['per_page'] = 30;
		$end=$config['per_page'];
		$config['uri_segment'] = 7;						
		$this->pagination->initialize($config);
		$links=$this->pagination->create_links();				
		switch ($type) {
			case 'pending':
				$config['total_rows']=count($this->art_sub_model->artSub_pendingList());
				$data=$this->art_sub_model->artSub_pendingList($sort_by,$ad,$start,$end);
				$title="Pending Artists";
				Template::set_view('admin/artsubmission');
				break;
			case 'approved':							
				$config['total_rows'] = count($this->art_sub_model->artSub_reviewed(1));				
				$data=$this->art_sub_model->artSub_reviewed(1,$sort_by,$ad,$start,$end);				
				$title="Approved Artists";								
				Template::set_view('admin/artsubmission_approved');
				break;
			case 'rejected':
				$title="Rejected Artists";
				$config['total_rows'] = count($this->art_sub_model->artSub_reviewed(0));				
				$data=$this->art_sub_model->artSub_reviewed(0,$sort_by,$ad,$start,$end);	
				Template::set_view('admin/artsubmission_rejected');
				break;
		}
		//Template::set_view('admin/artsubmission');
		Template::set('curr_url','/members/admin/artsubmission/'.$type.'/');	
		Template::set("sort_by",$sort_by);
		Template::set("ad",$ad);	
		Template::set('total_rows',$config['total_rows']);
		Template::set('links',$links);		
		Template::set('type',$type);
		Template::set('title',$title);
		Template::set('list',$data);
		Template:: render();
	}
	public function artsubmission_review($action,$from, $id){
		$this->load->model('art_sub_model');
		switch ($action) {
			case 'approve':
				$userdata=$this->art_sub_model->reviewArtSub($id,1);
				$email_template="artist_approved";				
				$subject="Application Approved!";
				$key="artist_approval";
				break;
			case 'reject':
				$userdata=$this->art_sub_model->reviewArtSub($id,0);
				$email_template="artist_rejected";
				$subject="Your Art";
				$key="artist_reject";
				break;			
		}
		$data['firstname']=$userdata[0]->firstname;
		$data['lastname']=$userdata[0]->lastname;
		$email=$userdata[0]->email;
		$data['email']=$email;
		$this->sendEmail($subject,$email,$email_template,$data,$key);
		redirect('/members/admin/artsubmission/'.$from.'/');
	}
	private function setupEmail(){
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->from('info@harngallery.com', 'Harn Gallery');		
	}
	private function getMessage($key,$data){
		$message="";
		$this->load->model("messages_model");
		$msg_obj=$this->load->messages_model->find_by('name',$key);		
		if($msg_obj){
			$message=$msg_obj->message;
			$message = str_replace("{firstname}", $data['firstname'] , $message);
			$message = str_replace("{lastname}", $data['lastname'] , $message);
			$message = str_replace("{email}", $data['email'] , $message);
			//$message = str_replace("{link}", $data['link'] , $message);
		}
		return $message;

	}
	private function sendEmail($subject,$to,$template,$data,$key){
		$this->setupEmail();
		$this->email->to($to); 		
		$this->email->subject($subject);
		//$message = $this->load->view("email/".$template,$data,TRUE); 
		$message=$this->getMessage($key,$data);
		$this->email->message($message);
		$this->email->send();
	}

	public function getitem($type="all"){
		$this->load->model('artwork_model');
		$sort_by="id";
		$ad="desc";
		$start=0;
		$searchID=$this->input->post('searchID');
		$list=$this->artwork_model->getItem2($searchID);		
		$this->load->model('artwork_model');		
		$this->load->library('pagination');
		$config['base_url'] = '/members/admin/artwork/'.$sort_by.'/'.$ad;
		$config['total_rows'] = count($this->artwork_model->getAll());
		$config['per_page'] = 30;
		$end=$config['per_page'];

		$list=$this->artwork_model->getItem2($searchID);		
		$this->pagination->initialize($config);
		$links=$this->pagination->create_links();
		Template::set('first',$start+1);
		Template::set('last',$end+1);
		Template::set('total_rows',$config['total_rows']);
		Template::set('links',$links);
		Template::set("sort_by",$sort_by);
		Template::set("ad",$ad);
		Template::set('list',$list);	
		Template::set('curr_url','/members/admin/artwork/');			
		Assets::add_js( 
			'$(function (){
				$("#chkbox_all").click(function(){
					 $("input:checkbox").prop("checked", this.checked);   
				});					
			});', 'inline' 
		);	
		Template::set_view('admin/artwork');
		Template::render();		
	}
	public function getPurchases($buyer_id,$sort_by="id",$ad="desc",$start=0){
		$this->load->model('artwork_model');		
		$this->load->library('pagination');
		$config['base_url'] = '/members/admin/artwork/'.$sort_by.'/'.$ad;
		$config['total_rows'] = count($this->artwork_model->getPurchases($buyer_id));
		$config['per_page'] = 30;
		$end=$config['per_page'];

		$list=$this->artwork_model->getPurchases($buyer_id,$sort_by,$ad,$start,$end);
		$this->pagination->initialize($config);
		$links=$this->pagination->create_links();
		Template::set('first',$start+1);
		Template::set('last',$end+1);
		Template::set('total_rows',$config['total_rows']);
		Template::set('links',$links);
		Template::set("sort_by",$sort_by);
		Template::set("ad",$ad);
		Template::set('list',$list);	
		Template::set('curr_url','/members/admin/artwork/');			
		Assets::add_js( 
			'$(function (){
				$("#chkbox_all").click(function(){
					 $("input:checkbox").prop("checked", this.checked);   
				});
				$("#bulkDelete").click(function(){
					deleteIDs=($("input[name=chkbox]:checked").map(function () {return this.value;}).get().join(","));
					if(confirm("Delete Artwork ("+deleteIDs+")?")){
						$.ajax({
			        		type: "POST",
			        		data:{deleteIDs:deleteIDs},
			        		url: "/members/admin/bulkDelete/"
			    		}).done(function(data) {       
							location.href="/members/admin/artwork/'.$sort_by.'/'.$ad.'/'.$start.'"
						});						
					}
				});				
			});', 'inline' 
		);	
		Template::set_view('admin/artwork');
		Template::render();			
	}
	public function artwork($sort_by="id",$ad="desc",$start=0){
		$this->load->model('artwork_model');		
		$this->load->library('pagination');
		$config['base_url'] = '/members/admin/artwork/'.$sort_by.'/'.$ad;
		//$config['total_rows'] = count($this->artwork_model->getAll_exclude_IIA());
		$config['total_rows'] = count($this->artwork_model->getAll());
		$config['per_page'] = 10;

		$end=$config['per_page'];
		$config['uri_segment'] = 6;		
		//$list=$this->artwork_model->getAll_exclude_IIA($sort_by,$ad,$start,$end);
		$list=$this->artwork_model->getAll($sort_by,$ad,$start,$end);
		$last=count($list);
		$this->pagination->initialize($config);
		$links=$this->pagination->create_links();
		Template::set('first',$start+1);
		Template::set('last',$last);
		Template::set('total_rows',$config['total_rows']);
		Template::set('links',$links);
		Template::set("sort_by",$sort_by);
		Template::set("ad",$ad);
		Template::set('list',$list);	
		Template::set('curr_url','/members/admin/artwork/');			
		Assets::add_js( 
			'$(function (){
				$("#chkbox_all").click(function(){
					 $("input:checkbox").prop("checked", this.checked);   
				});
				$("#bulkDelete").click(function(){
					deleteIDs=($("input[name=chkbox]:checked").map(function () {return this.value;}).get().join(","));
					if(confirm("Delete Artwork ("+deleteIDs+")?")){
						$.ajax({
			        		type: "POST",
			        		data:{deleteIDs:deleteIDs},
			        		url: "/members/admin/bulkDelete/"
			    		}).done(function(data) {       
							location.href="/members/admin/artwork/'.$sort_by.'/'.$ad.'/'.$start.'"
						});						
					}
				});				
			});', 'inline' 
		);	
		Template::render();		
	}

	public function bulkDelete(){
		$this->load->model('artwork_model');
		$deleteIDs=explode(",",$this->input->post('deleteIDs'));
		$data['deleteFlag']=1;
		foreach ($deleteIDs as $deleteID) {
			$this->artwork_model->update($deleteID, $data);
		}		
	}
	public function deleteArtwork($id,$redirect="artwork"){
		$this->load->model('artwork_model');
		$data['deleteFlag']=1;
		$return = $this->artwork_model->update($id, $data);
		redirect('/members/admin/'.$redirect);
	}
	public function banMember($id,$flag,$redirect="artist"){
		$this->load->model('members_model');
		$data['ban']=$flag;
		$return = $this->members_model->update($id, $data);
		if($redirect=="artist")
			redirect('/members/admin/artsubmission/approved');	
		else
			redirect('/members/admin/collectors');
	}
	public function new_this_week($sort_by="id",$ad="desc",$start=0){
		$this->load->model("homepage_model");
		if (isset($_POST['save'])){
			$this->load->homepage_model->add('ntw_date_text',$this->input->post('ntw_date_text'));
			
		}				
		$ndt=$this->load->homepage_model->find_by('name','ntw_date_text');		
		$ntw_date_text=$ndt->value;
			
		$this->load->model('artwork_model');
		$this->load->library('pagination');
		$config['base_url'] = '/members/admin/new_this_week/'.$sort_by.'/'.$ad;
		// $config['total_rows'] = count($this->newthisweek_model->getAll());
		$config['total_rows']=count($this->artwork_model->getNewThisWeek());
		$config['per_page'] = 20;
		$end=$config['per_page'];
		//$list=$this->newthisweek_model->getAll($sort_by,$ad,$start,$end);
		$list=$this->artwork_model->getNewThisWeek($sort_by="id",$ad="desc",$start,$end);
		$this->pagination->initialize($config);
		$links=$this->pagination->create_links();
		Template::set('ntw_date_text',$ntw_date_text);
		Template::set('links',$links);
		Template::set("sort_by",$sort_by);
		Template::set("ad",$ad);
		Template::set('list',$list);	
		Template::set('curr_url','/members/admin/new_this_week/');			
		Assets::add_js( 
			'$(function (){
				$("#chkbox_all").click(function(){
					 $("input:checkbox").prop("checked", this.checked);   
				});					
			});', 'inline' 
		);			
		Template::set('list',$list);
		Template::render();
	}
	public function add_to_newthisweek($id){
		$this->load->model("newthisweek_model");
		$art=$this->newthisweek_model->find_by("artwork_id",$id);
		$data['artwork_id']=$id;
		if($art){
			$this->newthisweek_model->update($id, $data);
		}else{
			$id = $this->newthisweek_model->insert($data);
		}
		redirect('/members/admin/new_this_week');
	}
	public function remove_from_newthisweek($id){
		$this->load->model("newthisweek_model");
		$result = $this->newthisweek_model->delete($id);
		redirect('/members/admin/new_this_week');
	}	
	public function staff_favourites($sort_by="id",$ad="desc",$start=0){
		$this->load->model("stafffavourites_model");
			
		$this->load->library('pagination');
		$config['base_url'] = '/members/admin/staff_favourites/'.$sort_by.'/'.$ad;
		$config['total_rows'] = count($this->stafffavourites_model->getAll());
		$config['per_page'] = 20;
		$end=$config['per_page'];
		$list=$this->stafffavourites_model->getAll($sort_by,$ad,$start,$end);
		$this->pagination->initialize($config);
		$links=$this->pagination->create_links();
		Template::set('links',$links);
		Template::set("sort_by",$sort_by);
		Template::set("ad",$ad);
		Template::set('list',$list);	
		Template::set('curr_url','/members/admin/staff_favourites/');			
		Assets::add_js( 
			'$(function (){
				$("#chkbox_all").click(function(){
					 $("input:checkbox").prop("checked", this.checked);   
				});					
			});', 'inline' 
		);			
		Template::render();
	}
	public function add_to_stafffavourites($id){
		$this->load->model("stafffavourites_model");
		$art=$this->stafffavourites_model->find_by("artwork_id",$id);
		$data['artwork_id']=$id;
		if($art){
			$this->stafffavourites_model->update($id, $data);
		}else{
			$id = $this->stafffavourites_model->insert($data);
		}
		redirect('/members/admin/staff_favourites');
	}
	public function remove_from_stafffavourites($id){
		$this->load->model("stafffavourites_model");
		$result = $this->stafffavourites_model->delete($id);
		redirect('/members/admin/staff_favourites');
	}		
	public function homepage_featured($sort_by="id",$ad="desc",$start=0){
		$this->load->model('featured_model');
		$this->load->library('pagination');
		$config['base_url'] = '/members/admin/homepage_featured/'.$sort_by.'/'.$ad;
		$config['total_rows'] = count($this->featured_model->getAll());
		$config['per_page'] = 20;
		$end=$config['per_page'];
		$list=$this->featured_model->getAll($sort_by,$ad,$start,$end);
		$this->pagination->initialize($config);
		$links=$this->pagination->create_links();
		Template::set('links',$links);
		Template::set("sort_by",$sort_by);
		Template::set("ad",$ad);
		Template::set('list',$list);	
		Template::set('curr_url','/members/admin/homepage_featured/');			
		Assets::add_js( 
			'$(function (){
				$("#chkbox_all").click(function(){
					 $("input:checkbox").prop("checked", this.checked);   
				});					
			});', 'inline' 
		);				
		Template::render();
	}
	public function add_to_homepage_featured($id){
		$this->load->model("featured_model");
		$art=$this->featured_model->find_by("artwork_id",$id);
		$data['artwork_id']=$id;
		if($art){
			$this->featured_model->update($id, $data);
		}else{
			$id = $this->featured_model->insert($data);
		}
		redirect('/members/admin/homepage_featured');
	}
	public function remove_from_homepage_featured($id){
		$this->load->model("featured_model");
		$result = $this->featured_model->delete($id);
		redirect('/members/admin/homepage_featured');
	}		
	public function collectors(){
		if (isset($_POST['save'])){
			$searchBy=$this->input->post('searchBy');
			$collectorSearch=$this->input->post('collectorSearch');		
			$list=$this->members_model->getBuyers($searchBy,$collectorSearch);	
		}else{
			$list=$this->members_model->getBuyers();
		}		
		Template::set('list',$list);		
		Template::render();
	}
	public function sales(){
		$this->load->model("orders_model");
		$list=$this->orders_model->getSales();
		Template::set('list',$list);		
		Template::render();
	}
	public function updateorder($order_number,$status){
		$this->load->model("orders_model");
		$data['ord_status']=$status;
		$this->orders_model->update($order_number,$data);	
		redirect('/members/admin/sales');
	}
	public function messages(){
		$this->load->model("messages_model");
		if (isset($_POST['save'])){
			$this->load->messages_model->add('registration_activation',addslashes($this->input->post('registration_activation')));
			$this->load->messages_model->add('artist_approval',addslashes($this->input->post('artist_approval')));
			$this->load->messages_model->add('artist_reject',addslashes($this->input->post('artist_reject')));
			$this->load->messages_model->add('new_artwork_uploaded',addslashes($this->input->post('new_artwork_uploaded')));
			$this->load->messages_model->add('sales_artist',addslashes($this->input->post('sales_artist')));
			$this->load->messages_model->add('sales_collector',addslashes($this->input->post('sales_collector')));	
		}
		$list=$this->load->messages_model->find_all();
		foreach ($list as $m) {
			$messages[$m->name]=$m->message;			
		}		
		Template::set('messages',$messages);		
		Assets::add_css( array('bootstrap-wysihtml5.css'));
		/*
		Assets::add_js( 
			"$(function (){
				$('.textarea').wysihtml5();
			});", 'inline' 
		);
		*/	
		Assets::add_js( array('tinymce/tinymce.min.js'));
		Assets::add_js( 
			"$(function (){
				tinymce.init({
selector: 'textarea',
plugins: [
'advlist autolink lists link image charmap print preview anchor',
'searchreplace visualblocks code fullscreen',
'insertdatetime media table contextmenu paste jbimages'
],
toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages',
    relative_urls: false,
    remove_script_host: false
});
			});", 'inline' 
		);	
		Template::render();
	}
	public function footer(){
		$this->load->model("homepage_model");
		if (isset($_POST['save'])){
			$this->load->homepage_model->add('about_us',addslashes($this->input->post('about_us')));
			$this->load->homepage_model->add('how_it_works',addslashes($this->input->post('how_it_works')));
			$this->load->homepage_model->add('privacy_policy',addslashes($this->input->post('privacy_policy')));
			$this->load->homepage_model->add('buyers_guide',addslashes($this->input->post('buyers_guide')));
			$this->load->homepage_model->add('artists_guide',addslashes($this->input->post('artists_guide')));
			$this->load->homepage_model->add('newsletter',addslashes($this->input->post('newsletter')));	
			$this->load->homepage_model->add('copyright',addslashes($this->input->post('copyright')));
			$this->load->homepage_model->add('terms',addslashes($this->input->post('terms')));	
			
		}
		$list=$this->load->homepage_model->find_all();
		foreach ($list as $m) {
			$messages[$m->name]=$m->value;
		}		
		Template::set('messages',$messages);
		Assets::add_css( array('bootstrap-wysihtml5.css'));
		Assets::add_js( array('tinymce/tinymce.min.js'));
		

		Assets::add_js( 
			'$(function (){
				tinymce.init({
selector: "textarea",
plugins: [
"advlist autolink lists link image charmap print preview anchor",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste jbimages"
],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
relative_urls: false
});

			});', 'inline' 
		);		
		Template::render();
	}
	public function slider(){
		$this->load->model("slider_model");	
		if (isset($_POST['save'])){
			$this->load->slider_model->update(1,$this->input->post('image1'),addslashes($this->input->post('txtText1')),addslashes($this->input->post('txtLink1')));
			$this->load->slider_model->update(2,$this->input->post('image2'),addslashes($this->input->post('txtText2')),addslashes($this->input->post('txtLink2')));
			$this->load->slider_model->update(3,$this->input->post('image3'),addslashes($this->input->post('txtText3')),addslashes($this->input->post('txtLink3')));
		}		
		$list=$this->load->slider_model->find_all();
		foreach ($list as $m) {
			$messages["image".$m->id]=$m->image;
			$messages["desc".$m->id]=$m->description;
			$messages["link".$m->id]=$m->link;
		}		
		Template::set('messages',$messages);
		Assets::add_js( array('bootstrap-datepicker.js','bootstrap-formhelpers.min.js'));
		Assets::add_js( array('vendor/jquery.ui.widget.js','load-image.min.js','canvas-to-blob.min.js','jquery.iframe-transport.js','jquery.fileupload.js',
			'jquery.fileupload-process.js','jquery.fileupload-image.js' ));		
		Assets::add_js( 
			"$(function (){
				$('.textarea').wysihtml5();
				$('.removeimage').live( 'click', function(){					
					$(this).parent().prev().show();
					$(this).parent().children().remove();
				});	
				$('.btnImageUpload').fileupload({
					dataType: 'json',
					url:'/members/admin/imageupload/slider',
					done: function (e, data) {
						$(this).hide();			        	
						$.each(data.result.files, function (index, file) {
							thefile=file;			            	
						});
						$('<img style=\'width:200px;height:150px;\' src=\''+thefile.url+'\'>').appendTo($(this).next());
						$('<a href=\"javascript:void(0)\" class=\"removeimage\"><i class=\"icon-trash\" style=\"vertical-align: text-top; position: absolute;\"></i></a>').appendTo($(this).next());
						$(this).parent().find('input:hidden').val(thefile.name);
						$('label.error').remove();
					}
				});
			});", 'inline' 
		);			
		Template::render();
	}
	public function banner(){
		$this->load->model("banner_model");	
		if (isset($_POST['save'])){
			$this->load->banner_model->update(1,$this->input->post('banner1'),addslashes($this->input->post('txtLink1')));
			$this->load->banner_model->update(2,$this->input->post('banner2'),addslashes($this->input->post('txtLink2')));
		}		
		$list=$this->load->banner_model->find_all();
		foreach ($list as $m) {
			$messages["image".$m->id]=$m->image;
			$messages["link".$m->id]=$m->link;
		}		
		Template::set('messages',$messages);
		Assets::add_js( array('bootstrap-datepicker.js','bootstrap-formhelpers.min.js'));
		Assets::add_js( array('vendor/jquery.ui.widget.js','load-image.min.js','canvas-to-blob.min.js','jquery.iframe-transport.js','jquery.fileupload.js',
			'jquery.fileupload-process.js','jquery.fileupload-image.js' ));		
		Assets::add_js( 
			"$(function (){
				$('.textarea').wysihtml5();
				$('.removeimage').live( 'click', function(){					
					$(this).parent().prev().show();
					$(this).parent().children().remove();
				});	
				$('.btnImageUpload').fileupload({
					dataType: 'json',
					url:'/members/admin/imageupload/banner',
					done: function (e, data) {
						$(this).hide();			        	
						$.each(data.result.files, function (index, file) {
							thefile=file;			            	
						});
						$('<img style=\'width:200px;height:150px;\' src=\''+thefile.url+'\'>').appendTo($(this).next());
						$('<a href=\"javascript:void(0)\" class=\"removeimage\"><i class=\"icon-trash\" style=\"vertical-align: text-top; position: absolute;\"></i></a>').appendTo($(this).next());
						$(this).parent().find('input:hidden').val(thefile.name);
						$('label.error').remove();
					}
				});
			});", 'inline' 
		);			
		Template::render();
	}

	public function invest_in_art(){
		$this->load->model("homepage_model");
		if (isset($_POST['save'])){
			$this->load->homepage_model->add('invest_intro',addslashes($this->input->post('invest_intro')));
			$this->load->homepage_model->add('invest_artist1',$this->input->post('artistimage1'));
			$this->load->homepage_model->add('invest_desc1',addslashes($this->input->post('invest_desc1')));
			$this->load->homepage_model->add('invest_artist2',$this->input->post('artistimage2'));
			$this->load->homepage_model->add('invest_desc2',addslashes($this->input->post('invest_desc2')));
		}
		$list=$this->load->homepage_model->find_all();
		foreach ($list as $m) {
			$messages[$m->name]=$m->value;
		}		
		Template::set('messages',$messages);	
		Assets::add_css( array('bootstrap-wysihtml5.css'));
		Assets::add_js( array('vendor/jquery.ui.widget.js','load-image.min.js','canvas-to-blob.min.js','jquery.iframe-transport.js','jquery.fileupload.js',
				'jquery.fileupload-process.js','jquery.fileupload-image.js' ));		
		Assets::add_js( array('tinymce/tinymce.min.js'));
		Assets::add_js( 
			"$(function (){
				tinymce.init({
selector: 'textarea',
plugins: [
'advlist autolink lists link image charmap print preview anchor',
'searchreplace visualblocks code fullscreen',
'insertdatetime media table contextmenu paste jbimages'
],
toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages',
relative_urls: false
});
				$('.removeimage').live( 'click', function(){					
					$(this).parent().prev().show();
					$(this).parent().children().remove();
				});	
				$('.btnImageUpload').fileupload({
					dataType: 'json',
					url:'/members/admin/imageupload/invest_in_art',
					done: function (e, data) {
						$(this).hide();			        	
						$.each(data.result.files, function (index, file) {
							thefile=file;			            	
						});
						$('<img style=\'width:200px;height:150px;\' src=\''+thefile.url+'\'>').appendTo($(this).next());
						$('<a href=\"javascript:void(0)\" class=\"removeimage\"><i class=\"icon-trash\" style=\"vertical-align: text-top; position: absolute;\"></i></a>').appendTo($(this).next());
						$(this).parent().find('input:hidden').val(thefile.name);
						$('label.error').remove();
					}
				});
			});", 'inline' 
		);		
		Template::render();
	}
	public function commission(){
		$this->load->model("homepage_model");
		if (isset($_POST['save'])){
			$this->load->homepage_model->add('commission_intro',addslashes($this->input->post('commission_intro')));			
			$this->load->homepage_model->add('commission_desc',addslashes($this->input->post('commission_desc')));
		}
		$list=$this->load->homepage_model->find_all();
		foreach ($list as $m) {
			$messages[$m->name]=$m->value;
		}		
		Template::set('messages',$messages);		
		Assets::add_css( array('bootstrap-wysihtml5.css'));
		Assets::add_js( array('tinymce/tinymce.min.js'));
		Assets::add_js( 
			"$(function (){
				tinymce.init({
selector: 'textarea',
plugins: [
'advlist autolink lists link image charmap print preview anchor',
'searchreplace visualblocks code fullscreen',
'insertdatetime media table contextmenu paste jbimages'
],
toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages',
relative_urls: false
});
			});", 'inline' 
		);	
		Template::render();
	}
	public function newsletter(){
		$this->load->model("members/newsletter_model");			
		$newsletters=$this->newsletter_model->find_all();
		Template::set("newsletters",$newsletters);
		Template::render();
	}
	public function stats(){
		$this->load->model("homepage_model");
		if (isset($_POST['save'])){
			$this->load->homepage_model->add('stats',addslashes($this->input->post('stats')));
		}
		$stats=$this->load->homepage_model->find_by('name','stats');		
		$messages['stats']=$stats->value;
		/*
		$list=$this->load->homepage_model->find_all();
		foreach ($list as $m) {
			$messages[$m->name]=$m->value;
		}
		*/

		
		Template::set('messages',$messages);		
		Template::render();
	}
	public function imageupload($subdir){
		$subdir_options="/".$subdir."/";		
		$upload_dir=$this->config->item('upload_dir').$subdir_options;
		$upload_url=$this->config->item('upload_url').$subdir_options;
		$options=array('upload_dir'=>$upload_dir,'upload_url'=>$upload_url);
		$this->load->library('UploadHandler',$options);
	}	

	public function moreinfo($member_id){
		$this->load->model('members_model');		
		$member = $this->members_model->find_by("id",$member_id);
		Template::set("member",$member);
		Template::render();
	}

	public function invest_in_art_artist(){
		$this->load->model("members_model");
		$list=$this->load->members_model->find_all_by("iia",1);
		Template::set('list',$list);
		Template::render();	
	}

	public function invest_in_art_editor(){
		$this->load->model("members_model");			
		if (isset($_POST['save'])){					
			$members_list=explode(",", $this->input->post('iia_members_ids'));			
			//$this->load->homepage_model->add('invest_intro',addslashes($this->input->post('invest_intro')));	
			$this->load->model("homepage_model");	
			$d['value']=addslashes($this->input->post('invest_intro'));
			$this->load->homepage_model->update(11,$d);
			foreach ($members_list as $member_id) {
				$data['iia_photo']=$this->input->post('artistimage'.$member_id);
				$data['iia_desc']=addslashes($this->input->post('invest_desc'.$member_id));
				$this->members_model->update($member_id, $data);
			}
		}
		$members=$this->load->members_model->find_all_by("iia",1);
		$this->load->model("homepage_model");
		$intro=$this->load->homepage_model->find_by('name','invest_intro');
		Template::set('intro',$intro->value);	
		Template::set('list',$members);	
		Assets::add_css( array('bootstrap-wysihtml5.css'));
		Assets::add_js( array('vendor/jquery.ui.widget.js','load-image.min.js','canvas-to-blob.min.js','jquery.iframe-transport.js','jquery.fileupload.js',
				'jquery.fileupload-process.js','jquery.fileupload-image.js' ));		
		Assets::add_js( array('tinymce/tinymce.min.js'));
		Assets::add_js( 
			"$(function (){
				tinymce.init({
selector: 'textarea',
plugins: [
'advlist autolink lists link image charmap print preview anchor',
'searchreplace visualblocks code fullscreen',
'insertdatetime media table contextmenu paste jbimages'
],
toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages',
relative_urls: false
});
				$('.removeimage').live( 'click', function(){					
					$(this).parent().prev().show();
					$(this).parent().children().remove();
				});	
				$('.btnImageUpload').fileupload({
					dataType: 'json',
					url:'/members/admin/imageupload/invest_in_art',
					done: function (e, data) {
						$(this).hide();			        	
						$.each(data.result.files, function (index, file) {
							thefile=file;			            	
						});
						$('<img style=\'width:200px;height:150px;\' src=\''+thefile.url+'\'>').appendTo($(this).next());
						$('<a href=\"javascript:void(0)\" class=\"removeimage\"><i class=\"icon-trash\" style=\"vertical-align: text-top; position: absolute;\"></i></a>').appendTo($(this).next());
						$(this).parent().find('input:hidden').val(thefile.name);
						$('label.error').remove();
					}
				});
			});", 'inline' 
		);				
		Template::render();
	}
	public function add_remove_invest_in_art($member_id,$flag,$from){
		$this->load->model("members_model");
		$data['iia']=$flag;
		$return = $this->members_model->update($member_id, $data);
		redirect('/members/admin/'.$from.'/');
	}

	public function edit_artwork($id){
		$this->load->model('artwork_model');
		if (isset($_POST['save'])){
			if ($this->save_artwork('update', $id)){
				Template::set_message('Artwork Successfully Save', 'success');
			}else{
				Template::set_message('Artwrok Edit Failure ' . $this->artwork_model->error, 'error');
			}
		}
		$artwork=$this->artwork_model->find($id);
		
		$this->load->library('harnutil');
		$select_category=$this->harnutil->dropdownselect("artwork_cat_id","",'category',$artwork->cat_id);
		$select_color=$this->harnutil->dropdownselect("artwork_color_id","",'color',$artwork->color_id);
		$select_style=$this->harnutil->dropdownselect("artwork_style_id","",'style',$artwork->style_id);
		$select_subject=$this->harnutil->dropdownselect("artwork_subject_id","",'subject',$artwork->subject_id);			
		Template::set('select_category',$select_category);
		Template::set('select_style',$select_style);
		Template::set('select_color',$select_color);
		Template::set('select_subject',$select_subject);				
		Template::set('artwork', $artwork);
		Template::set('toolbar_title', lang('artwork_edit') .' Artwork');
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
		Assets::add_js( "
			var curr_medium_id=".$artwork->medium_id.";
			var med_cat={};
			".$j.";", 'inline' );	
		Assets::add_js( "$(function () {
			$('#artwork_cat_id').change(function(){
				populateMedium($(this).val(),curr_medium_id);
			});
			
			function populateMedium(cat_id,medium_id){
				if(typeof(medium_id)==='undefined') medium_id = 9;							
				$('#artwork_medium_id').children().remove();
				$('#artwork_medium_id').append('<option>Please select</option>');
				if(cat_id){
					tmp=med_cat[cat_id];					
					for(var i=0; i<tmp.length; i++){
						$('#artwork_medium_id').append('<option value=\''+tmp[i].id+'\' '+((medium_id==tmp[i].id)?'selected':'')+'>'+tmp[i].name+'</option>');	
					}
				}
			}	
			$('#artwork_cat_id').trigger('change');
		});
		", 'inline' );					
		Template::render();
	}
	private function save_artwork($type='insert', $id=0){
		if ($type == 'update'){
			$_POST['id'] = $id;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['image']        = $this->input->post('artwork_image');
		$data['title']        = $this->input->post('artwork_title');
		$data['description']        = $this->input->post('artwork_description');
		$data['created']        = $this->input->post('artwork_created') ? $this->input->post('artwork_created') : '0000-00-00';
		$data['user_id']        = $this->input->post('artwork_user_id');
		$data['price']        = $this->input->post('artwork_price');
		$data['cat_id']        = $this->input->post('artwork_cat_id');
		$data['medium_id']        = $this->input->post('artwork_medium_id');
		$data['style_id']        = $this->input->post('artwork_style_id');
		$data['orientation_id']        = $this->input->post('artwork_orientation_id');
		//$data['size_id']        = $this->input->post('artwork_size_id');
		$data['color_id']        = $this->input->post('artwork_color_id');
		$data['height']        = $this->input->post('artwork_height');
		$data['width']        = $this->input->post('artwork_width');
		$data['dimension_unit']        = $this->input->post('artwork_dimension_unit');
		$data['framing']        = $this->input->post('artwork_framing');
		$data['keywords']        = $this->input->post('artwork_keywords');


		if ($type == 'insert'){
			$id = $this->artwork_model->insert($data);

			if (is_numeric($id)){
				$return = $id;
			}else{
				$return = FALSE;
			}
		}elseif ($type == 'update'){
			$return = $this->artwork_model->update($id, $data);
		}
		return $return;
	}
	public function change_password(){
		if (isset($_POST['save'])){			
			$oldPassword=$this->input->post('oldPassword');
			$pswd=$this->input->post('newPassword');
			$query = $this->db->get_where('admin_password', array('id' => 1,'pswd'=>$oldPassword));
			if($query->num_rows()>0){
				$this->db->where('id', 1);
				$this->db->update('admin_password', array('pswd'=>$pswd)); 
			}else{
				Template::set('error_msg','Wrong Old Password');
			}		
		}
		Template::render();
	}
	public function login(){
		$sess_array = array('logged_in' => false);
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
		}else{
			Template::render();
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/members/admin');
	}
}