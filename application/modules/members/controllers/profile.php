<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class profile extends Front_Controller{

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		//Template::set_theme('webadmin');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('members_model', null, true);
		$this->lang->load('members');
		Assets::add_js( array('jquery-1.7.2.min.js', 'jquery.validate.js','bootstrap.min.js' ,'jquery.masonry.min.js','readmore.js','scripts.js' ));
		Assets::add_css( array('bootstrap.min.css', 'bootstrap-responsive.css', 'bootstrap-lightbox.css','style.css'));
	}
	public function index(){
		$members=$this->session->userdata('members_loggedin');

		if(!$members)
			redirect('/');
		else
			redirect('members/profile/portfolio/'.$members['id']);			
	}
	public function info(){
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
			$members['ship_type']=$userdata->ship_type;
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
					$members['ship_type']=$userdata->ship_type;	
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
					Template::set('error_message','Updated!');
				}else{
					Template::set('error_message',$this->members_model->error);
				}
			}
			$this->load->helper('address_helper');			
			Assets::add_css( array('bootstrap-formhelpers.min.css','datepicker.css'));
			Assets::add_js( array('bootstrap-datepicker.js','bootstrap-formhelpers.min.js'));
			Assets::add_js( array('vendor/jquery.ui.widget.js','load-image.min.js','canvas-to-blob.min.js','jquery.iframe-transport.js','jquery.fileupload.js',
				'jquery.fileupload-process.js','jquery.fileupload-image.js','jquery.validate.js' ));
			Assets::add_module_js('members', 'profile_info.js');			
			Template::render();
			
		}else{
			redirect('/');
		}
	}
	public function add_remove_favourite_art($artwork_id,$flag){
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			$this->load->model("favouriteart_model");
			$f_art=$this->favouriteart_model->find(
				array('member_id'=>$members['id'],'artwork_id'=>$artwork_id));
			$data['member_id']=$members['id'];
			$data['artwork_id']=$artwork_id;
			if($f_art){
				if($flag){
					$this->favouriteart_model->update($f_art->id,$data);
				}else{
					$this->favouriteart_model->delete($f_art->id);
				}
			}else{
				if($flag){
					$this->favouriteart_model->insert($f_art->id,$data);
				}
			}				
		}
	}
	public function add_remove_favourite_artist($artist_id,$flag){
		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			$this->load->model("favouriteart_model");
			$f_artist=$this->favouriteartist_model->find(
				array('member_id'=>$members['id'],'artist_id'=>$artist_id));
			$data['member_id']=$members['id'];
			$data['artist_id']=$artist_id;
			if($f_artist){
				if($flag){
					$this->favouriteartist_model->update($f_artist->id,$data);
				}else{
					$this->favouriteartist_model->delete($f_artist->id);
				}
			}else{
				if($flag){
					$this->favouriteartist_model->insert($f_artist->id,$data);
				}
			}				
		}
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
		$data['about'] 	= $this->input->post('members_about');
		$data['photo'] 	= $this->input->post('members_photo');
		$data['ship_type'] = $this->input->post('members_ship');		

		$this->db->where('id', $id);
		$this->db->update('bf_members', $data); 
		
		return true;
	}		

	public function portfolio($id=null){
		$members=$this->session->userdata('members_loggedin');		
		if($id==null)
			if($members)
				$id=$members['id'];
			else
				redirect('/');
		$member=$this->members_model->find_by("id",$id);
		$this->load->model("favouriteartist_model");
		$fa=$this->favouriteartist_model->find_by(array('member_id'=>$members['id'],'artist_id'=>$id));	
		if($fa){
			$fav_artist=true;
		}else{
			$fav_artist=false;
		}
		//Assets::add_module_js('members', 'portfolio.js');
		Assets::add_js( "
		$(function () {
			$(window).resize(function() {
				divAboutWidth=$('#harn_content').width()-$('#divArtistPhoto').width()-10				
				$('#divArtistAbout').width(divAboutWidth);
			});			
			$.ajax({
        		type: 'POST',
        		url: '/members/profile/artworks/".$id."'
    		}).done(function(data) {       
				$('#main_content').html(data);
				init_masonry(40);
				$('article').readmore({maxHeight: 140});
			});
			if (getInternetExplorerVersion() >= 10){
				$('.artist_photo').each(function(){
					var el = $(this);
					el.css({'position':'absolute'}).wrap('<div class=\'img_wrapper\' style=\'display: inline-block\'>').clone().addClass('img_grayscale').css({'position':'absolute','z-index':'5','opacity':'0'}).insertBefore(el).queue(function(){
						var el = $(this);
						el.parent().css({'width':this.width,'height':this.height});
						el.dequeue();
					});
					this.src = grayscaleIE10(this.src);
				});				
			};
			divPhotoWidth=$('#divArtistPhoto').width();
			harnContentWidth=$('#harn_content').width();									
			if( ($(window).width()) < 769){   
				divAboutWidth=harnContentWidth-divPhotoWidth-25;
			}else{
				console.log('minus 10');
				divAboutWidth=harnContentWidth-divPhotoWidth-10;
			}
			$('#divArtistAbout').width(divAboutWidth);
		});", 'inline' );	
		Template::set('fav_artist',$fav_artist);
		Template::set('page_title',$member->firstname.' '.$member->lastname.' - Harngallery.com Online Art Gallery');
		Template::set('meta_desc','Art for sale by '.$member->firstname.' '.$member->lastname.' - Harngallery.com Online Art Gallery');
		Template::set('meta_keywords',$member->firstname.' '.$member->lastname.', buy art, buy art online, art gallery, art for sale, affordable art, artwork for sale, online art gallery');
		Template::set("member",$member);
		Template::set("members",$members);
		Template::set('page_image','http://www.harngallery.com/uploads/'.$member->id.'/registration/profile_photo/'.$member->photo);
		Template::render();	
	}

	public function artworks_list($memberid='',$exclude_id=''){
		if($memberid=='')
			redirect('/');		
		$this->load->model("artwork_model");
		$artworks=$this->artwork_model->getByArtist($memberid,$exclude_id,0,8);
		//$artworks=$this->artwork_model->getByArtist($memberid);
		$data['artworks']=$artworks;
		$this->load->view("members/profile/artworks_list",$data);
	}	
	private function updateVisits($artwork_id=''){
		if($artwork_id=='')
			redirect('/');
		$members=$this->session->userdata('members_loggedin');		
		if($members){
			$data['member_id']=$members['id'];
		}else{
			$data['member_id']=0;
		}
		$data['artwork_id']=$artwork_id;
		$this->load->model("visits_model");
		$this->visits_model->insert($data);
	}
	public function item($id=''){
		if($id=='')
			redirect('/');
		$this->load->model("artwork_model");
		$item=$this->artwork_model->getItem($id);
		$this->updateVisits($id);
		//// Curator
		$this->load->model('curator_model');
		$curator=$this->curator_model->find_by("artwork_id",$id);
		$curator_flag=false;
		if($curator){
			if($curator->on_flag){
				$curator_flag=true;
				Template::set('curator',$curator);
			}
		}		
		Template::set('curator_flag',$curator_flag);
		///// Curator
		$f_art_flag=false;
		$members=$this->session->userdata('members_loggedin');	
		Template::set('members',$members);
		if($members){			
			$this->load->model("favouriteart_model");
			//$f_art=$this->favouriteart_model->find(array('member_id'=>$members['id'],'artwork_id'=>$id));
			$f_art=$this->favouriteart_model->where('member_id', $members['id'])->find_all_by('artwork_id', $id);
			if($f_art)
				$f_art_flag=true;
		}
		Template::set('f_art_flag',$f_art_flag);
		$f_artist_flag=false;		
		if($members){
			Template::set('members',$members);
			$this->load->model("favouriteartist_model");
			//$f_artist=$this->favouriteartist_model->find(array('member_id'=>$members['id'],'artist_id'=>$item->user_id));
			$f_artist=$this->favouriteartist_model->where('member_id', $members['id'])->find_all_by('artist_id', $item->user_id);
			//$f_artist=$this->favouriteartist_model->getAll($members['id'],$item->user_id);
			if($f_artist)
				$f_artist_flag=true;
		}
		Template::set('f_artist_flag',$f_artist_flag);

		//Assets::add_module_js('members', 'item.js');
		Assets::add_js( array('bootstrap-lightbox.min.js','grayscale.js'));
		Assets::add_js( "
		$(function () {
			$(window).resize(function() {
				window.location = window.location.pathname;
			});
			$('article').readmore({maxHeight: 140});
			$('#artist_purchase').click(function(){
				$('#AlertModal_Title').html('Collector’s account');
              	$('#AlertModal_Message').html('Please open a Collector’s account to be able to purchase artworks.');
              	$('#AlertModal').modal('show');   
			});	
			$.ajax({
        		type: 'POST',
        		url: '/members/profile/artworks_list/".$item->user_id."/".$id."',
        		data: {exclude_id: $id}
    		}).done(function(data) {       
				$('#item_list').html(data);
			});
			if (getInternetExplorerVersion() >= 10){
				$('.artist_photo').each(function(){
					var el = $(this);
					el.css({'position':'absolute'}).wrap('<div class=\'img_wrapper\' style=\'display: inline-block\'>').clone().addClass('img_grayscale').css({'position':'absolute','z-index':'5','opacity':'0'}).insertBefore(el).queue(function(){
						var el = $(this);
						el.parent().css({'width':this.width,'height':this.height});
						el.dequeue();
					});
					this.src = grayscaleIE10(this.src);
				});				
			};
		});", 'inline' );	
		$this->load->model('art_category');
		$cat=$this->art_category->find_by('id',$item->cat_id);
		Template::set('page_title',$item->title.' by '.$item->firstname.' '.$item->lastname.' - '.$cat->name.' - Harngallery.com Online Art Gallery');
		Template::set('meta_desc',$item->title.' by '.$item->firstname.' '.$item->lastname.' - '.$cat->name.' - Harngallery.com Online Art Gallery');
		Template::set('meta_keywords',$item->firstname.' '.$item->lastname.', '.$item->title.', '.$cat->name.', buy art, buy art online, art gallery, art for sale, affordable art, artwork for sale, online art gallery');
		Template::set('artwork',$item);
		Template::set('page_image','http://www.harngallery.com/uploads/'.$item->user_id.'/artwork/thumbnail/'.$item->image);
		Template::render();
	}
	
	public function getfavartist($start=0,$sort_by="id",$ad="desc"){
		$members=$this->session->userdata('members_loggedin');
		$f_artist=array();
		if($members){	
			$logged_in=true;		
			$this->load->model("favouriteartist_model");
			$favouriteartist=$this->favouriteartist_model->find_all_by('member_id',$members['id']);	
			if($favouriteartist){
				foreach ($favouriteartist as $ar) {
					array_push($f_artist,$ar->artist_id);
				}
			}		
			$this->load->model("members_model");
			$this->load->library('pagination');
			$config['total_rows'] = count($this->members_model->getFavouriteArtist($members['id'],$sort_by,$ad,$start));
			$config['per_page'] = 30;
			$end=$config['per_page'];
			$artists=$this->members_model->getFavouriteArtist($members['id'],$sort_by,$ad,$start);
			$config['base_url'] = '/members/profile/getfavartist/';			
			$data['artists']=$artists;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['links']=$this->pagination->create_links();
			$data['totalArtists']=$config['total_rows'];
			$data['f_artist']=$f_artist;
			$data['logged_in']=$logged_in;
			$this->load->view("members/profile/members",$data);	
		}		
	}

	public function getfavart($start=0,$sort_by="id",$ad="desc"){
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
			$this->load->model("artwork_model");
			$this->load->library('pagination');
			$config['total_rows'] = count($this->artwork_model->getFavouriteArt($members['id'],$sort_by,$ad,$start));
			$config['per_page'] = 30;
			$end=$config['per_page'];			
			$artworks=$this->artwork_model->getFavouriteArt($members['id'],$sort_by,$ad,$start,$end);
			$config['base_url'] = '/members/profile/getfavart/';			
			$data['artworks']=$artworks;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['artworks']=$artworks;
			$data['links']=$this->pagination->create_links();
			$data['totalArtworks']=$config['total_rows'];
			$data['f_art']=$f_art;
			$data['logged_in']=$logged_in;
			$data['f_art_flag']=true;
			$this->load->view("members/profile/artworks",$data);					
		}						
	}
	public function getAllArtworks($start=0){			
		$this->load->model("artwork_model");
		$this->load->library('pagination');
		$config['base_url'] = '/members/profile/getAllArtworks/';
		$config['total_rows'] = count($this->artwork_model->getAllArtworks());
		$config['per_page'] = 5;
		$end=$config['per_page'];

		$artworks=$this->artwork_model->getAllArtworks($start,$end);
		$this->pagination->initialize($config);
		$data['artworks']=$artworks;
		$data['links']=$this->pagination->create_links();
		$this->load->library('pagination');		
		$this->load->view("members/profile/artworks_list",$data);		
	}
	public function artworks($memberid='',$start=0){
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
		if($memberid=='')
			redirect('/');			
		$this->load->model("artwork_model");
		$this->load->library('pagination');
		$config['total_rows'] = count($this->artwork_model->getByArtist($memberid,0));
		$config['per_page'] = 30;
		$end=$config['per_page'];
		$artworks=$this->artwork_model->getByArtist($memberid,0,$start,$end);
		$config['base_url'] = '/members/profile/artworks/'.$memberid;								
		$config['uri_segment'] = 5;
		$data['artworks']=$artworks;		
		$this->pagination->initialize($config);
		$data['artworks']=$artworks;
		$data['links']=$this->pagination->create_links();
		$data['totalArtworks']=$config['total_rows'];
		$data['f_art']=$f_art;
		$data['logged_in']=$logged_in;
		$this->load->view("members/profile/artworks",$data);
	}

	public function getFeatured(){
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
		
		$this->load->model("artwork_model");
		$artworks=$this->artwork_model->getFeatured('id','desc',0,8);
		$data['artworks']=$artworks;		
		$data['f_art']=$f_art;
		$data['logged_in']=$logged_in;
		$data['featured_art_flag']=true;
		$data['totalArtworks']=0;
		$this->load->view("members/profile/artworks",$data);
		//$this->load->view("members/profile/featured_artworks",$data);
	}
	public function getArtworks($type='all',$sortType=1,$start=0){
		$members=$this->session->userdata('members_loggedin');
		$my_art_flag=false;
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

		$this->load->model("artwork_model");
		$this->load->library('pagination');
		$sort_by="id";
		$ad="desc";
		$this->updatesortarrangement();
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
		switch ($type) {
			case 'featured':
				$config['total_rows'] = count($this->artwork_model->getFeatured());
				$config['per_page'] = 6;
				$end=$config['per_page'];
				$artworks=$this->artwork_model->getFeatured($sort_by,$ad,$start,$end);
				$config['base_url'] = '/members/profile/getArtworks/featured/'.$sortType;	
				$config['uri_segment'] = 6;			
				break;			
			case 'newthisweek':
				$config['total_rows'] = count($this->artwork_model->getNewThisWeek());
				$config['per_page'] = 25;
				$end=$config['per_page'];
				$artworks=$this->artwork_model->getNewThisWeek($sort_by,$ad,$start,$end);
				$config['base_url'] = '/members/profile/getArtworks/newthisweek/'.$sortType;
				$config['uri_segment'] = 6;				
				break;
			case 'under500':
				$config['total_rows'] = count($this->artwork_model->getUnder500());
				$config['per_page'] = 25;
				$end=$config['per_page'];
				$artworks=$this->artwork_model->getUnder500($sort_by,$ad,$start,$end);
				$config['base_url'] = '/members/profile/getArtworks/under500/'.$sortType;	
				$config['uri_segment'] = 6;			
				break;
			case 'stafffavourites':
				$config['total_rows'] = count($this->artwork_model->getStaffFavourites());
				$config['per_page'] = 25;
				$end=$config['per_page'];
				$artworks=$this->artwork_model->getStaffFavourites($sort_by,$ad,$start,$end);
				$config['base_url'] = '/members/profile/getArtworks/stafffavourites/'.$sortType;	
				$config['uri_segment'] = 6;			
				break;				
			case 'popular':
				$config['per_page'] = 25;
				$config['total_rows'] = count($this->artwork_model->getPopular());
				$end=$config['per_page'];
				$artworks=$this->artwork_model->getPopular($sort_by,$ad,$start,$end);				
				$config['base_url'] = '/members/profile/getArtworks/popular/'.$sortType;
				$config['uri_segment'] = 6;
				break;							
			case 'myart':
				if(!$members)
					redirect('/');
				$config['per_page'] = 25;
				$config['total_rows'] = count($this->artwork_model->getByArtist2($members['id']));
				$end=$config['per_page'];
				$artworks=$this->artwork_model->getByArtist2($members['id'],$sort_by,$ad,$start,$end);				
				$config['base_url'] = '/members/profile/getArtworks/myart/'.$sortType;
				$config['uri_segment'] = 6;
				$my_art_flag=true;
				break;	
			default:
				
				$config['per_page'] = 25;
				$config['total_rows'] = count($this->artwork_model->getAllArtworks());
				$end=$config['per_page'];
				$artworks=$this->artwork_model->getAllArtworks($sort_by,$ad,$start,$end);		
				$config['base_url'] = '/members/profile/getArtworks/all/'.$sortType;	
				$config['uri_segment'] = 6;			
				break;
		}
		$this->pagination->initialize($config);
		$data['artworks']=$artworks;
		$data['links']=$this->pagination->create_links();
		$data['totalArtworks']=$config['total_rows'];	
		$data['f_art']=$f_art;
		$data['logged_in']=$logged_in;
		$data['my_art_flag']=$my_art_flag;
		$this->load->view("members/profile/artworks",$data);		
	}
	public function deleteArtwork(){
		$artwork_id=$this->input->post('artwork_id');
		$this->load->model("artwork_model");
		$item=$this->artwork_model->getItem($artwork_id);
		$members=$this->session->userdata('members_loggedin');		
		if($members){	
			if($item->user_id==$members['id']){
				$data['deleteFlag']=1;
				$this->artwork_model->update($artwork_id,$data);
			}
		}
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
	public function changepassword(){
		$members=$this->session->userdata('members_loggedin');		
		if(!$members)
			redirect('/');		
		$this->load->model('members_model');
		$members_data=$this->members_model->find_by("id",$members['id']);
		$members['type']=$members_data->type;
		$message='';
		if (isset($_POST['save'])){
			$oldPassword=md5($this->input->post('oldPassword'));
			$pswd=md5($this->input->post('newPassword'));
			
			if($members_data->pswd==$oldPassword){
				$data['pswd']=$pswd;
				$this->members_model->update($members['id'], $data);	
				$message='Password Changed!';
			}else{
				$message='Old Password is wrong!';
			}
		}
		Template::set('members',$members);	
		Template::set('message',$message);
		Assets::add_js( "
			$('#cpForm').validate({
				rules: {
			        oldPassword: 'required',
			        newPassword: 'required',
			        confirmPassword: {
			            equalTo: '#newPassword'
			        }
		    	},
				submitHandler: function(form) {  
					if ($(form).valid()) 
						form.submit(); 
					return false; // prevent normal form posting
				} 
			});
		", 'inline' );	
		
		Template::render();
	}
}