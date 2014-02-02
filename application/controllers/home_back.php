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
		Assets::add_js( array('jquery-1.7.2.min.js','jquery.validate.js', 'bootstrap.min.js' ,'jquery.masonry.min.js','scripts.js' ));
		Assets::add_css( array('bootstrap.min.css', 'bootstrap-responsive.min.css', 'bootstrap-lightbox.css','style.css'));
		$this->load->library('users/auth');
		$this->set_current_user();
//		Template::set_block('registration_modal','members/registration_modal');
	}

	//--------------------------------------------------------------------

	/**
	 * Displays the homepage of the Bonfire app
	 *
	 * @return void
	 */
	public function index()
	{
		/*
		$this->load->library('installer_lib');

		if (!$this->installer_lib->is_installed())
		{
			redirect( site_url('install') );
		}
		*/
		$this->load->model("members/slider_model");	
		$list=$this->load->slider_model->find_all();
		foreach ($list as $m) {
			$slider["image".$m->id]=$m->image;
			$slider["desc".$m->id]=$m->description;
			$slider["link".$m->id]=$m->link;
		}		
		Template::set('slider',$slider);		
        Assets::add_js( "
		$(function () {
			loadloader();
			$.ajax({
        		type: 'POST',
        		url: '/members/profile/getArtworks/featured'
    		}).done(function(data) {       
				loadartwork(data);
			});
		});", 'inline' );	
		Template::render();
	}//end index()

	public function browseart()
	{	
	Assets::add_js( "$(document).ready(function(){	
    	addArrToDDL($('#ctlCategory'),category);   
    	addArrToDDL($('#ctlPrice'),price);
    	addArrToDDL($('#ctlMedium'),medium[0]);
    	addArrToDDL($('#ctlOrientation'),orientation);
    	addArrToDDL($('#ctlStyle'),style);
    	addArrToDDL($('#ctlSubject'),subject);
    	addArrToDDL($('#ctlSize'),size);
    	addArrToDDL($('#ctlColor'),color);
    	addArrToDDL($('#ctlLocation'),_location);
    	
    	
    	$('#ctlCategory').change(function() {
    		addArrToDDL($('#ctlMedium'),medium[$(this).val()]);			
		});	
		loadloader();
		$.ajax({
        		type: 'POST',
        		url: '/members/profile/getArtworks/all'
    		}).done(function(data) {       
				loadartwork(data);
			});
		//init_masonry(40);
		});", 'inline' );		

		Template::render();
	}
	public function new_this_week()
	{
		Assets::add_js( "$(document).ready(function(){
    	//init_masonry(40);
			loadloader();
			$.ajax({
        		type: 'POST',
        		url: '/members/profile/getArtworks/newthisweek'
    		}).done(function(data) {       
				loadartwork(data);
			});
		});", 'inline' );
		Template::render();
	}
	public function under_500()
	{
		Assets::add_js( "$(document).ready(function(){
    	//init_masonry(40);
			loadloader();
			$.ajax({
        		type: 'POST',
        		url: '/members/profile/getArtworks/under500'
    		}).done(function(data) {       
				loadartwork(data);
			});
		});", 'inline' );
		Template::render();
	}
	public function staff_favorites()
	{
		Assets::add_js( "$(document).ready(function(){
    	//init_masonry(40);
			loadloader();
			$.ajax({
        		type: 'POST',
        		url: '/members/profile/getArtworks/stafffavourites'
    		}).done(function(data) {       
				loadartwork(data);
			});
		});", 'inline' );
		Template::render();
	}
	public function most_popular()
	{
		Assets::add_js( "			
			$(document).ready(function(){			
    	//init_masonry(40);
			loadloader();
			$.ajax({
        		type: 'POST',
        		url: '/members/profile/getArtworks/popular'
    		}).done(function(data) {       
				loadartwork(data);
			});			
		});", 'inline' );
		Template::render();
	}
	public function invest_in_art(){
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::render();		
	}
	public function commissions()
	{
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
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
		Template::render();
	}
	public function privacy_policy()
	{
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
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
		Template::render();
	}
	public function support()
	{
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::render();
		Template::render();
	}	
	public function newsletter()
	{
		$messages=$this->getHomePage();
		Template::set('messages',$messages);
		Template::render();
		Template::render();
	}
	public function contact_us(){
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