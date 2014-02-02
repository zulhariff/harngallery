<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Bonfire
 *
 * An open source project to allow developers get a jumpstart their development of CodeIgniter applications
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2011 - 2013, Bonfire Dev Team
 * @license   http://guides.cibonfire.com/license.html
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Home controller
 *
 * The base controller which displays the homepage of the Bonfire site.
 *
 * @package    Bonfire
 * @subpackage Controllers
 * @category   Controllers
 * @author     Bonfire Dev Team
 * @link       http://guides.cibonfire.com/helpers/file_helpers.html
 *
 */
class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('application');
		$this->load->library('Template');
		$this->load->library('Assets');
		$this->lang->load('application');
		$this->load->library('events');
		$this->load->library('form_validation');
		Assets::add_js( array('jquery-1.7.2.min.js','jquery.validate.js', 'bootstrap.min.js' ,'jquery.masonry.min.js','jquery.hovercard.min.js','scripts.js' ));
		Assets::add_css( array('bootstrap.min.css', 'bootstrap-responsive.css', 'bootstrap-lightbox.css','style.css'));
		$this->load->library('users/auth');
		$this->set_current_user();
		
//		Template::set_block('registration_modal','members/registration_modal');
	}

	public function getCaptchaImage(){
		$this->load->helper('captcha');
	    $vals = array(
	        'img_path' => 'images/',
	        'img_url' => 'http://www.harngallery.com/images/',
	        'font_path'  => './assets/fonts/Vera.ttf',
	        'expiration' => 7200
	        );             
	      $captcha = create_captcha($vals);
	      $this->session->set_userdata('captchaWord', $captcha['word']);
	      echo $captcha['image'];

	}
	//--------------------------------------------------------------------

	/**
	 * Displays the homepage of the Bonfire app
	 *
	 * @return void
	 */
	public function index()
	{
		$this->load->model("members/slider_model");	
		$list=$this->load->slider_model->find_all();
		foreach ($list as $m) {
			$slider["image".$m->id]=$m->image;
			$slider["desc".$m->id]=$m->description;
			$slider["link".$m->id]=$m->link;
		}		
		Template::set('slider',$slider);
		$this->load->model("members/banner_model");		
		$list=$this->banner_model->find_all();
		$messages=array();
		if($list){
			foreach ($list as $m) {
				$messages["banner_image".$m->id]=$m->image;
				$messages["banner_link".$m->id]=$m->link;
			}	
		}
		
    
		Template::set('page_title','Art for Sale – Art Gallery – Buy Art on Harngallery.com');
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');
		Template::set('messages',$messages);		
        Assets::add_js( "
		$(function () {
			$(window).resize(function() {
				MainLoadFeature();
			});
        	function MainLoadFeature(){
				loadloader();
				$.ajax({
	        		type: 'POST',
	        		url: '/members/profile/getFeatured'
	    		}).done(function(data) {       
					loadfeatured(data);
				});
        	}
        	MainLoadFeature();
        	$('#newsletterForm').validate({
					debug : true,
					ignore: [],
					rules: {
					txtNewsletterEmail: {
				        required: true,
				        email: true
				    }				
			},
				submitHandler: function(form) {  
					if ($(form).valid()) 		
						form.submit(); 		
					/*				
		        		email=$('#txtNewsletterEmail').val();
						$.ajax({
		        		type: 'POST',
		        		data:{txtEmail:email,save:1},
		        		url: '/home/newsletter_submit'
			    		}).done(function(data) {    
			    			
			    			data=JSON.parse(data);
			    				alert('Success');	    				
						});
        		*/
					} 
				});	 
        	
		});", 'inline' );	
		Template::render();
	}//end index()
	public function test(){
		$i=0;
		$this->load->model("members/artwork_model");
		$artist_sorted=$this->load->artwork_model->getUserSortOrder();
		var_dump($artist_sorted);
		$as=array();
		foreach ($artist_sorted as $ar) {
			array_push($as,$ar->id);
		}
		$artwork_all=$this->load->artwork_model->getAll();
		$total_artwork=count($artwork_all);		
		$data['sort']=0;
		$this->db->update('bf_artwork', $data);
		echo "total_artwork=".$total_artwork."<BR />";
		while ($i <= $total_artwork-1) {
			foreach ($as as $k => $v) {
				if ($i >= $total_artwork)
        			continue;
				$getUnsorted=$this->load->artwork_model->getByArtistNoSort($v);				
				if(count($getUnsorted)){
					$i++;
					$data['sort']=$i;
					$this->artwork_model->update($getUnsorted[0]->id, $data);	
					echo "i=".$i."--- artwork id=".$getUnsorted[0]->id."<BR>";
				}else{
					unset($as[$k]);
				}				
			}			
		}
		
	}
	public function browseart(){	
		$this->load->library('harnutil');
		$this->load->model("members/art_category");
		$categories=$this->art_category->getAll();
		Template::set('categories',$categories);
		$j="";
		$this->load->model("members/art_medium");
		$j.="med_cat[0]=[];";
		$j.="tmp={};";
				$j.="tmp['id']=0;";
				$j.="tmp['name']='All';";
				$j.="med_cat[0].push(tmp);";
		foreach ($categories as $category){
			$j.="med_cat[".$category->id."]=[];";
				$j.="tmp={};";
				$j.="tmp['id']=0;";
				$j.="tmp['name']='All';";
				$j.="med_cat[".$category->id."].push(tmp);";
			$mediums=$this->art_medium->getByCategoryID($category->id);						
			foreach($mediums as $medium){		
				$j.="tmp={};";
				$j.="tmp['id']=".$medium->id.";";
				$j.="tmp['name']='".$medium->name."';";
				$j.="med_cat[".$category->id."].push(tmp);";
				//$m[$category->id][]=array('id'=>$medium->id,'name'=>$medium->name);
			}
		}		
		$searchstring=$this->input->post('txtSearch');
		if(!$searchstring)
			$searchstring='';
		$this->load->model("members/art_color");
		$colors=$this->art_color->getAllBut('None');
		Template::set('colors',$colors);

		$this->load->model("members/art_subject");
		$subjects=$this->art_subject->getAll();
		Template::set('subjects',$subjects);

		$this->load->model("members/art_style");
		$styles=$this->art_style->getAllBut('I am not sure');
		Template::set('styles',$styles);

		$this->load->model("members/art_orientation");
		$orientations=$this->art_orientation->getAll();
		Template::set('orientations',$orientations);
		Assets::add_js( "
					var med_cat={};
					".$j.";", 'inline' );	
	Assets::add_js( "
		$(function (){			
			$(window).resize(function() {
				//console.log('resize');
			});
			populateMedium($('#ctlCategory').val());
	    	$('#ctlCategory').change(function() {    		
	    		//addArrToDDL($('#ctlMedium'),medium[$(this).val()]);			
	    		populateMedium($(this).val());
			});
			$('#collapseOne').on('hidden',function(){
				$('#ctlMedium').val(0);
				$('#ctlOrientation').val(0);
				$('#ctlSize').val(0);
				$('#ctlLocation').val(0);
				$('#ctlStyle').val(0);
				$('#ctlColor').val(0);
			});
			$('#searchCollapse').click(function(){
				if($('#collapseOne').hasClass('in')){
					$(this).text('Advanced Search');
				}else{
					$(this).text('Close');
				}
			});
			function populateMedium(cat_id){	
				$('#ctlMedium').children().remove();
				tmp=med_cat[cat_id];
				for(var i=0; i<tmp.length; i++){
					$('#ctlMedium').append('<option value='+tmp[i].id+'>'+tmp[i].name+'</option>');	
				}
			}			
			loadloader();
			ajaxArtwork('browse_art',1,'".$searchstring."');
		});", 'inline' );		
		Template::set('page_title','Browse Art – Harngallery.com Online Art Gallery');
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');
		Template::render();
	}
	public function new_this_week(){
		Assets::add_js( "$(document).ready(function(){
			loadloader();
			ajaxArtwork('new_this_week',1);
		});", 'inline' );
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::set('page_title',"New This Week – Harngallery.com Online Art Gallery");
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');	
		Template::render();
	}
	public function under_500()
	{
		Assets::add_js( "$(document).ready(function(){
			loadloader();
			ajaxArtwork('under500',1);

		});", 'inline' );
		Template::set('page_title','Under $800 – Harngallery.com Online Art Gallery');
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');
		Template::render();
	}
	public function staff_favorites()
	{
		Assets::add_js( "$(document).ready(function(){
			loadloader();			
			ajaxArtwork('staff_favourite',1);
		});", 'inline' );
		Template::set('page_title','Staff Favourites – Harngallery.com Online Art Gallery');
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');
		Template::render();
	}
	public function most_popular()
	{
		Assets::add_js( "			
			$(document).ready(function(){			
			loadloader();
			ajaxArtwork('most_popular',6);	
		});", 'inline' );
		Template::set('page_title',"Most Popular – Harngallery.com Online Art Gallery");
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');	
		Template::render();
	}
	public function invest_in_art(){
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Assets::add_js( "			
			$(document).ready(function(){			
			loadIIALoader();
			$.ajax({
        		type: 'POST',
        		url: '/members/getIIA'
    		}).done(function(data) {       
				loadInvestInArt(data);
			});			
		});", 'inline' );	
		Template::set('page_title','Invest in Art – Harngallery.com Online Art Gallery');
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');
		Template::render();		
	}
	public function commissions()
	{
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::set('page_title',"Commission – Harngallery.com Online Art Gallery");
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');	
		Template::render();
	}
	private function getHomePage(){
		$this->load->model("members/homepage_model");
		$list=$this->load->homepage_model->find_all();
		foreach ($list as $m) {
			$messages[$m->name]=$m->value;
		}
		return $messages;		
	}
	public function about_us()
	{
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::set('page_title','About Us – Harngallery.com Online Art Gallery');
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');
		Template::render();
	}
	public function privacy_policy()
	{
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::set('page_title','Privacy Policy – Harngallery.com Online Art Gallery');
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');
		Template::render();
	}
	public function copyright(){
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::render();		
	}
	public function terms_of_service()
	{
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::set('page_title','Terms of Services – Harngallery.com Online Art Gallery');
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');
		Template::render();
	}
	public function support(){
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::render();		
	}	
	public function how_it_works(){
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::set('page_title','How it works – Harngallery.com Online Art Gallery');
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');
		Template::render();
	}
	public function buyers_guide(){
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::set('page_title',"Buyer's – Harngallery.com Online Art Gallery");
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');
		Template::render();
	}
	public function artists_guide(){
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::set('page_title',"Artist's – Harngallery.com Online Art Gallery");
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');
		Template::render();
	}
	public function search(){
		$search=$this->input->post('txtSearch');
		echo $search;
	}
	public function newsletter_submit(){
		if (isset($_POST['save'])){
			$email=$this->input->post('txtEmail');
			$this->load->model("members/newsletter_model");			
			$existing=$this->newsletter_model->find_by("email",$email);
			$members=$this->session->userdata('members_loggedin');
			if($members)
				$data['member_id']=$members['id'];		
			$data['email']=$email;		
			if(!$existing){
				$id = $this->newsletter_model->insert($data);
				$json=array("status"=>1);
			}else{
				$json=array("status"=>0,"message"=>"Email already exist");
			}
			echo json_encode($json);			
		}		
	}
	public function newsletter(){		
		if (isset($_POST['save'])){
			$email=$this->input->post('txtEmail');
			$this->load->model("members/newsletter_model");			
			$existing=$this->newsletter_model->find_by("email",$email);
			$members=$this->session->userdata('members_loggedin');
			if($members)
				$data['member_id']=$members['id'];		
			$data['email']=$email;
			//Template::set_view('home/newsletter_submitted');
			$message="";
			if(!$existing){
				$id = $this->newsletter_model->insert($data);				
				$error_messages="Thank you. You have successfully subscribed to our newsletter.";	
			}else{
				$error_messages="Email already exist";				
			}
			Template::set('error_messages',$error_messages);	
		}else{
			 Assets::add_js( "
			$(function () {
        	$('#newsletterForm').validate({
					debug : true,
					ignore: [],
					rules: {
					txtEmail: {
				        required: true,
				        email: true
				    }				
			},
				submitHandler: function(form) {  
					if ($(form).valid()) 		
						form.submit(); 		
						return false;
					} 
				});	 
			});", 'inline' );
				 
		}
		$messages=$this->getHomePage();
		Template::set('messages',$messages);		
		Template::set('page_title',"Newsletter – Harngallery.com Online Art Gallery");
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');	
		Template::render();		

	}
	public function contact_us(){
		if (isset($_POST['save'])){
			$name=$this->input->post('txtName');
			$email=$this->input->post('txtEmail');
			$message=$this->input->post('txtMessage');
			$subject=$this->input->post('txtSubject');
			$word = $this->session->userdata('captchaWord');
			$captcha_input=$this->input->post('contactus_captcha');
			if($captcha_input==$word){				
				$this->load->model("members/contactus_model");						
				$members=$this->session->userdata('members_loggedin');
				if($members)
					$data['member_id']=$members['id'];		
				$data['name']=$name;
				$data['email']=$email;
				$data['message']=$message;
				$data['subject']=$subject;
				$id = $this->contactus_model->insert($data);

				$this->load->library('email');
				$this->email->set_mailtype("html");
				//$this->email->from($this->config->item('email_support'), $this->config->item('website_name'));
				$this->email->from($email, $name);
				$this->email->to($this->config->item('email_support')); 	
				$this->email->subject('Contact Us');
				$email_message="Subject:".$subject."<BR />";
				$email_message.="Name:".$name."<BR />";
				$email_message.="Email:".$email."<BR />";
				$email_message.="Message:".$message."<BR />";
				$this->email->message($email_message);
				$this->email->send();				
				$message="Successful!";					
				Template::set_view('home/contact_us_submitted');
				Template::set('message',$message);	
			}else{
				Template::set('name',$name);
				Template::set('email',$email);
				Template::set('message',$message);
				Template::set('subject',$subject);
				Template::set('error_message','Wrong Captcha Input');
				Template::set('page_title',"Contact Us – Harngallery.com Online Art Gallery");
				Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
				Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');	
				Assets::add_js("$(function () {
					$('#contactUsForm').validate({
						debug : true,
						ignore: [],
						rules: {
						txtName: 'required',
						txtMessage: 'required',
						txtSubject: 'required',
						contactus_captcha: 'required',
						txtEmail: {
					        required: true,
					        email: true
					    }				
					} ,
					submitHandler: function(form) {  
						if ($(form).valid()) 
							form.submit(); 
							return false;
						} 
					});			
				$.ajax({
		                type: 'POST',
		                url: '/home/getCaptchaImage'
		                }).done(function(data) {       
		                    $('#ContactUsCaptcha').html(data);
		                });
				});", 'inline' );					
				Template::render();
			}

		}else{

			Assets::add_js("$(function () {
				$('#contactUsForm').validate({
					debug : true,
					ignore: [],
					rules: {
					txtName: 'required',
					txtMessage: 'required',
					txtSubject: 'required',
					contactus_captcha: 'required',
					txtEmail: {
				        required: true,
				        email: true
				    }				
				} ,
				submitHandler: function(form) {  
					if ($(form).valid()) 
						form.submit(); 
						return false;
					} 
				});			
			$.ajax({
	                type: 'POST',
	                url: '/home/getCaptchaImage'
	                }).done(function(data) {       
	                    $('#ContactUsCaptcha').html(data);
	                });
			});", 'inline' );	
		}
		Template::set('page_title',"Contact Us – Harngallery.com Online Art Gallery");
		Template::set('meta_desc','Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators');
		Template::set('meta_keywords','buy art, buy art online, art gallery, art for sale, oil painting gallery, paintings for sale, affordable art, artwork for sale, online art gallery, abstract art, abstract painting, acrylic paintings, original oil paintings, abstract art painting, cheap art, photos for sale, emerging artists');	
		Template::render();
	}
	public function upload_page()
	{

		Template::render();
	}
	public function getpath(){
		echo realpath(dirname(__FILE__));
	}
	//--------------------------------------------------------------------

	/**
	 * If the Auth lib is loaded, it will set the current user, since users
	 * will never be needed if the Auth library is not loaded. By not requiring
	 * this to be executed and loaded for every command, we can speed up calls
	 * that don't need users at all, or rely on a different type of auth, like
	 * an API or cronjob.
	 *
	 * Copied from Base_Controller
	 */
	protected function set_current_user()
	{
		if (class_exists('Auth'))
		{
			// Load our current logged in user for convenience
			if ($this->auth->is_logged_in())
			{
				$this->current_user = clone $this->auth->user();

				$this->current_user->user_img = gravatar_link($this->current_user->email, 22, $this->current_user->email, "{$this->current_user->email} Profile");

				// if the user has a language setting then use it
				if (isset($this->current_user->language))
				{
					$this->config->set_item('language', $this->current_user->language);
				}
			}
			else
			{
				$this->current_user = null;
			}

			// Make the current user available in the views
			if (!class_exists('Template'))
			{
				$this->load->library('Template');
			}
			Template::set('current_user', $this->current_user);
		}
	}

	public function upload(){
		$this->load->library('UploadHandler');
		return;
	}
	//--------------------------------------------------------------------
}//end class