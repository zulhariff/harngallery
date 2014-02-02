<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends Front_Controller{
	private $data;
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('text');
 		$this->load->helper('url');
 		$this->load->helper('form');
		$this->flexi = new stdClass;
		$this->load->library('flexi_cart');	
		$currency_data = array(
			'name' => 'USD',
			'exchange_rate' => 1,
			'symbol' => '$',
			'symbol_suffix' => FALSE,
			'thousand_separator' => ',',
			'decimal_separator' => '.'
			);
		$this->flexi_cart->set_currency($currency_data);
		//$this->load->vars('base_url', 'http://www.harngallery.com/members/');
		//$this->load->vars('includes_dir', 'http://www.harngallery.com/flexi_cart/includes/');
		//$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
		Assets::add_js( array('jquery-1.7.2.min.js', 'jquery.validate.js','bootstrap.min.js' ,'jquery.masonry.min.js','scripts.js' ));
		Assets::add_css( array('bootstrap.min.css', 'bootstrap-responsive.css', 'bootstrap-lightbox.css','style.css'));
		//,'global.css','structure.css'
		$this->mini_cart_data();
	}
	function index() {
		$this->view_cart();		
	}
	
	function view_cart() {
		if ($this->input->post('update')){
			$this->update_cart();
		}	
		else if ($this->input->post('clear')){
			$this->clear_cart();
		}
		else if ($this->input->post('destroy')){
			$this->destroy_cart();
		}
		else if ($this->input->post('checkout')){
			redirect('/members/cart/checkout');			

		}
		$this->data['cart_items'] = $this->flexi_cart->cart_items(); 		
		Template::set_view('cart/cart_view');
		Template::set('cart_items',$this->data['cart_items']);
		Template::render();
	}
		

	function delete_item($row_id = FALSE) {
		$this->flexi_cart->delete_items($row_id);	
		redirect('members/cart/view_cart');		
	}
	
	function clear_cart(){
		$this->flexi_cart->empty_cart(TRUE);
		redirect('members/cart/view_cart');
	}
	
	function destroy_cart(){
		$this->flexi_cart->destroy_cart();
		redirect('members/cart/view_cart');
	}

	function insert_link_item_to_cart($item_id = 0){
		$this->load->model('cart_model');		
		$this->cart_model->insert_item_to_cart($item_id);
		redirect('members/cart/view_cart');		
	}

	function insert_ajax_link_item_to_cart($item_id = 0){
		$this->load->model('cart_model');		
		$this->cart_model->demo_insert_ajax_link_item_to_cart($item_id);
		redirect('members/cart/view_cart');		
	}

	function insert_ajax_form_item_to_cart(){
		$this->load->model('cart_model');
		$this->cart_model->demo_insert_ajax_form_item_to_cart();
		redirect('members/cart/view_cart');		
	}

	function insert_database_item_to_cart($item_id = 0){
		$this->load->model('cart_model');		
		$this->cart_model->demo_insert_database_item_to_cart($item_id);		
		redirect('members/cart/view_cart');		
	}
	
	function checkout() {
		$this->load->model('cart_model');
		if (! $this->flexi_cart->cart_status()){
			Template::set_message('You must add an item to the cart before you can checkout.', 'error');
			redirect('members/cart/view_cart');
		}

		if ($this->input->post('checkout')){				
			$response = $this->cart_model->save_order();
			if ($response){			
				$this->paypal_transact($this->flexi_cart->order_number());
				//redirect('/members/cart/checkout_complete/'.$this->flexi_cart->order_number());	
			}else{
				echo "error";
			}
		}

		if($this->session->userdata('members_loggedin')){
			$members=$this->session->userdata('members_loggedin');
			$this->load->model('members_model');
			$userdata=$this->members_model->find_by('id',$members['id']);
			$cart_items=$this->flexi_cart->cart_items();
			$ship_country='';
			foreach($cart_items as $item){				
				if($item["artist_id"]==$members['id']){
					Template::set_message("You are not allowed to purchase your own artwork", 'error');		
					redirect('members/cart/view_cart');
				}
				$artist=$this->members_model->find_by('id',$item["artist_id"]);
				if($artist->ship_type==2){
					if($ship_country==''){
						$ship_country=$artist->country;
					}else{
						if($ship_country!=$artist->country){
							Template::set_message("There are conflicting shipping countries", 'error');		
							redirect('members/cart/view_cart');
						}
					}
				}		
			}	
			$members['country']=$userdata->country;
			$members['address1']=$userdata->address1;
			$members['address2']=$userdata->address2;
			$members['phone']=$userdata->phone;
			$members['city']=$userdata->city;
			$members['postal']=$userdata->postal;			
			$this->load->helper('address_helper');		
			Template::set('members',$members);		
			Template::set('userdata',$userdata);
			Template::set_view('cart/checkout_view');			
			if($ship_country!=''){
				$countries = config_item('address.countries');	
				$ship_country_text=$countries[$ship_country]['printable'];				
				Assets::add_js( "$(function () {	
						$.validator.addMethod('ifCountryMatch',function(value, element) {
							sel_country=$('select[name=\"checkout[shipping][country]\"]');						
							if(sel_country.val()=='$ship_country'){
								return true;
							}else{
								return false;
							}					
						}, 'Sorry, the artist ships only to $ship_country_text');				
						$('#shippingForm').validate({
							rules: {						
							'checkout[shipping][country]' : 'ifCountryMatch'
						} ,
						submitHandler: function(form) {  
							if ($(form).valid()) 
								form.submit(); 
								return false; // prevent normal form posting
							} 
						});
					})", 'inline' );				
			}
			Template::render();
		}else{			
			Template::set_message("Please login before checking out", 'error');		
			redirect('members/cart/view_cart');
		}
	}
	function paypal_cancel($order_number){
		$this->load->model("members/orders_model");
		$the_order=$this->orders_model->find_by('ord_order_number',$order_number);
		if($the_order){
			$data['ord_status']=5;
			$this->orders_model->update($order_number,$data);	
		}
		$this->flexi_cart->destroy_cart();
		Template::set_view('cart/order_cancelled');
		Template::render();
	}
	function paypal_transact($order_number){
		//$this->flexi_cart->destroy_cart(); // 12th Jan 14 - Destroy Cart
		$this->load->model("members/orders_model");
		$the_order=$this->orders_model->find_by('ord_order_number',$order_number);
		$this->config->load('paypal');		
		$config = array(
			'Sandbox' => $this->config->item('Sandbox'), 			// Sandbox / testing mode option.
			'APIUsername' => $this->config->item('APIUsername'), 	// PayPal API username of the API caller
			'APIPassword' => $this->config->item('APIPassword'), 	// PayPal API password of the API caller
			'APISignature' => $this->config->item('APISignature'), 	// PayPal API signature of the API caller
			'APISubject' => '', 									// PayPal API subject (email address of 3rd party user that has granted API permission for your app)
			'APIVersion' => $this->config->item('APIVersion')		// API version you'd like to use for your call.  You can set a default version in the class and leave this blank if you want.
		);
		$this->load->library('paypal/Paypal_pro', $config);	


		$Payments = array();
	
		$Payment = array(
						'amt' => $this->flexi_cart->item_summary_total(0, 0, 1),
						'currencycode' => 'USD', 
						'itemamt' => $this->flexi_cart->item_summary_total(0, 0, 1),						
						'notifyurl' => 'http://www.harngallery.com/members/cart/ipn_confirm/'.$order_number, 	
						'sellerusername' => $this->config->item('website_name')
						);	
		$PaymentOrderItems = array();
		$cart_items=$this->flexi_cart->cart_items();							
		foreach($cart_items as $item){
			$Item = array(
					'name' => $item['title'],
					'desc' => $item['description'],
					'amt' => $item['internal_price'],
					'number' => $item['id'],
					'itemurl' => $this->config->item('item_profile').$item['id'],
					'qty' => '1'
					);
			array_push($PaymentOrderItems, $Item);
		}
		$Payment['order_items'] = $PaymentOrderItems;		
		array_push($Payments, $Payment);
		if (isset($_GET['token'])){	
			$token=$_GET['token'];
			$PayerID=$_GET['PayerID'];
			$DECPFields = array(
				'token' => $_GET['token'],
				'payerid' => $_GET['PayerID']
			);	
			$PayPalRequestData = array(
								'DECPFields' => $DECPFields, 
								'Payments' => $Payments			
							);
							
			$PayPalResult = $this->paypal_pro->DoExpressCheckoutPayment($PayPalRequestData);
			
			if(!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK'])){
				$errors = array('Errors'=>$PayPalResult['ERRORS']);
				var_dump($errors);
			}else{
				$this->payment_confirm($order_number);
			}				
		}else{
			$SECFields = array(
								'returnurl' => 'http://www.harngallery.com/members/cart/paypal_transact/'.$order_number, 							// Required.  URL to which the customer will be returned after returning from PayPal.  2048 char max.
								'cancelurl' => 'http://www.harngallery.com/members/cart/paypal_cancel/'.$order_number, 							// Required.  URL to which the customer will be returned if they cancel payment on PayPal's site.							
								'logoimg' => 'http://www.harngallery.com/assets/images/logo_190.jpg',
								'email' => $the_order->ord_email, 					// Email address of the buyer as entered during checkout.  PayPal uses this value to pre-fill the PayPal sign-in page.  127 char max.
								'landingpage' => 'Billing', 						// Type of PayPal page to display.  Can be Billing or Login.  If billing it shows a full credit card form.  If Login it just shows the login screen.
								'brandname' => $this->config->item('website_name'), 							// A label that overrides the business name in the PayPal account on the PayPal hosted checkout pages.  127 char max.
								'surveyquestion' => '', 					// Text for the survey question on the PayPal Review page. If the survey question is present, at least 2 survey answer options need to be present.  50 char max.
								'surveyenable' => ''

							);				

			$PayPalRequestData = array(
							'SECFields' => $SECFields, 						
							'Payments' => $Payments
						);					
			$PayPalResult = $this->paypal_pro->SetExpressCheckout($PayPalRequestData);
			
			if(!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK'])){
				$errors = array('Errors'=>$PayPalResult['ERRORS']);
				var_dump($errors);
			}else{							
				redirect($PayPalResult['REDIRECTURL']);
			}
		}		
	}
	private function payment_confirm($order_number){	
		$this->load->model("members/artwork_model");
		$this->load->model("members/orders_model");
		$this->load->model('members_model');
		$the_order=$this->orders_model->find_by('ord_order_number',$order_number);
		if($the_order){
			$data['ord_status']=3;
			$this->orders_model->update($order_number,$data);	
			$order_dets=$this->orders_model->getOrderDetails($order_number);
			foreach($order_dets as $order_det){			
				$cust_id=$order_det->ord_collector;
				$cust_name=$order_det->ord_ship_name;
				$cust_email=$order_det->ord_email;
				$cust_shipping1=$order_det->ord_ship_address_01;
				$cust_shipping2=$order_det->ord_ship_address_02;
				$cust_shipping_city=$order_det->ord_ship_city;			
				$cust_postal_code=$order_det->ord_ship_post_code;
				$cust_country=$order_det->ord_ship_country;
				$cust_phone=$order_det->ord_phone;
				$countries = config_item('address.countries');
				$shipping_address="Address : ".$cust_shipping1."<BR />City: ".$cust_shipping_city."<BR />Postal: ".$cust_postal_code."<BR />Country: ".$countries[$cust_country]['printable']."<BR />Phone: ".$cust_phone."<BR />";
				$artwork_title=$order_det->ord_det_item_name;
				$artwork_id=$order_det->ord_det_item_fk;				
				$artwork_link="<a href='".$this->config->item('item_profile').$artwork_id."'>".$this->config->item('item_profile').$artwork_id."</a>";
				$artist_name=$order_det->ord_artist_name;
				$artist_email=$order_det->ord_artist_email;
				$artist_id=$order_det->ord_artist_id;	
				$price=$order_det->ord_det_price;				
				//$price_70=round($price * 0.7,2);
				$artist=$this->members_model->find_by('id',$artist_id);
				if($artist->ship_type==1){
					$pac=80;
				}else{
					$pac=65;
				}
				$percentage_after_commission=$pac."%";
				$price_after_commission=round($price * ($pac/100),2);
				$this->artwork_model->update($artwork_id, array('sold'=>1));
				//$this->emailToSeller($artist_email,$artwork_link,$artwork_title,$artist_name,$cust_name,$shipping_address,$price_70);
				$this->emailToSeller($artist_email,$artwork_link,$artwork_title,$artist_name,$cust_name,$shipping_address,$price_after_commission,$percentage_after_commission);
				$this->emailToBuyer($cust_email,$artwork_title,$artist_name,$shipping_address);
				//$this->emailMessageLG($artwork_link,$cust_name,$cust_email,$shipping_address,$artist_name,$artist_email);
				$this->emailMessageLG($artwork_link,$cust_name,$cust_email,$shipping_address,$artist_name,$artist_email,$price,$price_after_commission,$percentage_after_commission);
			}
			$this->flexi_cart->destroy_cart();
			redirect('/members/cart/checkout_complete_view');
		}									
	}
	
	function checkout_complete_view(){
		Template::render();
	}
	/*
	function checkout_complete($order_number = FALSE) {
		$this->load->library('flexi_cart_admin');
		$this->data['order_number'] = $order_number;
		$sql_where = array($this->flexi_cart_admin->db_column('order_summary', 'order_number') => $this->data['order_number']);
		$this->load->model("members/artwork_model");
		$this->load->model("members/orders_model");
		$order_dets=$this->orders_model->getOrderDetails($this->data['order_number']);
		foreach($order_dets as $order_det){			
			$cust_id=$order_det->ord_collector;
			$cust_name=$order_det->ord_ship_name;
			$cust_email=$order_det->ord_email;
			//$cust_email="zulkarnain.shariff@gmail.com";
			$cust_shipping1=$order_det->ord_ship_address_01;
			$cust_shipping2=$order_det->ord_ship_address_02;
			$cust_shipping_city=$order_det->ord_ship_city;			
			$cust_postal_code=$order_det->ord_ship_post_code;
			$cust_country=$order_det->ord_ship_country;
			$cust_phone=$order_det->ord_phone;
			$shipping_address="Address 1: ".$cust_shipping1."<BR />Address 2: ".$cust_shipping2."<BR />City: ".$cust_shipping_city."<BR />Postal: ".$cust_postal_code."<BR />Country: ".$cust_country."Phone:".$cust_phone;
			$artwork_title=$order_det->ord_det_item_name;
			//$artwork_link=$order_det->ord_artwork_link;
			$artwork_id=$order_det->ord_det_item_fk;
			$artwork_link="http://www.harngallery.com/members/profile/item/".$artwork_id;
			$artist_name=$order_det->ord_artist_name;
			$artist_email=$order_det->ord_artist_email;
			//$artist_email="zulkarnain.shariff@gmail.com";
			$artist_id=$order_det->ord_artist_id;			
			$this->artwork_model->update($artwork_id, array('sold'=>1));
			$this->emailToSeller($artist_email,$artwork_link,$artwork_title,$artist_name,$cust_email,$shipping_address);
			$this->emailToBuyer($cust_email,$artwork_title,$artist_name,$shipping_address);
			$this->emailMessageLG($artwork_link,$cust_name,$cust_email,$shipping_address,$artist_name,$artist_email);
		}		
		$this->flexi_cart->destroy_cart();
		
		Template::set_view('cart/checkout_complete_view');
		Template::render();
	}
	*/

	//private function emailMessageLG($artwork_link,$cust_name,$cust_email,$shipping_address,$artist_name,$artist_email){
	private function emailMessageLG($artwork_link,$cust_name,$cust_email,$shipping_address,$artist_name,$artist_email,$price,$price_after_commission,$percentage_after_commission){
		$subject="Artwork sold";
		$message="<a href='$artwork_link'>Artwork</a><br />";
		$message.="Buyers Name: ".$cust_name."<br /> Buyer's Email: ".$cust_email."<BR />".$shipping_address."<BR />";
		$message.="Artist Name: ".$artist_name."<br /> Artist's Email: ".$artist_email."<BR />";
		$message.="Selling Price: $".$price."<BR />";
		$message.="Price After Commission: (".$percentage_after_commission.") -$".$price_after_commission;
		$this->sendEmail($subject,$this->config->item('admin_email'),$message);
	}
	private function emailToBuyer($buyer_email,$artwork_title,$artist_name,$shipping_address){
		$subject="Thank you for your purchase";
		$this->load->model("messages_model");
		$msg_obj=$this->load->messages_model->find_by('name','sales_collector');
		$message=$msg_obj->message;
		$message = str_replace("{artwork_title}", $artwork_title, $message);
		$message = str_replace("{artist_name}", $artist_name , $message);
		$message = str_replace("{shipping_address}", $shipping_address, $message);	
		$this->sendEmail($subject,$buyer_email,$message);
	}
	//private function emailToSeller($seller_email,$artwork_link,$artwork_title,$artist_name,$buyer_name,$shipping_address,$price_70){
	private function emailToSeller($seller_email,$artwork_link,$artwork_title,$artist_name,$buyer_name,$shipping_address,$price_after_commission,$percentage_after_commission){		
		$subject="Sale";
		$this->load->model("messages_model");
		$msg_obj=$this->load->messages_model->find_by('name','sales_artist');
		$message=$msg_obj->message;
		$message = str_replace("{artwork_title}", $artwork_title, $message);
		$message = str_replace("{artist_name}", $artist_name , $message);
		$message = str_replace("{artwork_link}", $artwork_link, $message);	
		$message = str_replace("{buyer_name}", $buyer_name, $message);	
		$message = str_replace("{shipping_address}", $shipping_address, $message);	
		$message = str_replace("{price_after_commission}", $price_after_commission, $message);	
		$message = str_replace("{percentage_after_commission}", $percentage_after_commission, $message);			
		$this->sendEmail($subject,$seller_email,$message);

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
	private function sendEmail($subject,$to,$message){
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->from($this->config->item('email_support'), $this->config->item('website_name'));		
		$this->email->to($to); 		
		$this->email->subject($subject);		
		$this->email->message($message);
		$this->email->send();
	}	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// MINI CART DATA
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * mini_cart_data
	 * This function is called by the '__construct()' to set item data to be displayed on the 'Mini Cart' menu.
	 */ 
	private function mini_cart_data()
	{
		$this->data['mini_cart_items'] = $this->flexi_cart->cart_items();
	}
}
