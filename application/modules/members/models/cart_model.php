<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model {
	

	public function &__get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}

	

	function insert_item_to_cart($item_id = 0){
		$this->load->library('flexi_cart');
		$this->load->model("artwork_model");
		$artwork=$this->artwork_model->getItem($item_id);
		$countries = config_item('address.countries');
		if($artwork && $artwork->sold==0){
			$cart_data = array(
				'id' => $artwork->id, 
				'title' => $artwork->title, 
				'description'=> $artwork->description,
				'quantity' => 1, 
				'price' => $artwork->price,
				'image' => 'http://www.harngallery.com/uploads/'.$artwork->member_id.'/artwork/thumbnail/'.$artwork->image,
				'artist' =>$artwork->firstname." ".$artwork->lastname,
				'artist_id'=>$artwork->user_id,
				'artist_email'=>$artwork->email,
				'country'=>$countries[$artwork->country]['printable']
				);			

			$this->flexi_cart->insert_items($cart_data);
		}
	}

	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// SAVE CART AND CUSTOMER DETAILS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	function save_order(){
		$this->load->library('form_validation');
		$this->load->library('flexi_cart_admin');
		

		$this->form_validation->set_rules('checkout[shipping][firstname]', 'Shipping Name', 'required');
		$this->form_validation->set_rules('checkout[shipping][lastname]', 'Shipping Name', 'required');		
		$this->form_validation->set_rules('checkout[shipping][add_01]', 'Shipping Address', 'required');
		$this->form_validation->set_rules('checkout[shipping][city]', 'Shipping ', 'required');
		$this->form_validation->set_rules('checkout[shipping][post_code]', 'Shipping Post / Zip Code', 'required');
		$this->form_validation->set_rules('checkout[shipping][country]', 'Shipping Country', 'required');
		$this->form_validation->set_rules('checkout[phone]', 'Phone Number', 'required');

		if ($this->form_validation->run())
		{
			$order_data = $this->input->post('checkout');
			$custom_summary_data = array(
				'ord_collector' => $order_data['member_id'],
				'ord_bill_name' => $order_data['shipping']['firstname'].' '.$order_data['shipping']['lastname'],
				'ord_bill_address_01' => $order_data['shipping']['add_01'],
				'ord_bill_address_02' => $order_data['shipping']['add_02'],
				'ord_bill_city' => $order_data['shipping']['city'],
				'ord_bill_state' => '',
				'ord_status'=> 1,
				'ord_bill_post_code' => $order_data['shipping']['post_code'],
				'ord_bill_country' => $order_data['shipping']['country'],
				'ord_ship_name' => $order_data['shipping']['firstname'].' '.$order_data['shipping']['lastname'],
				'ord_ship_address_01' => $order_data['shipping']['add_01'],
				'ord_ship_address_02' => $order_data['shipping']['add_02'],
				'ord_ship_city' => $order_data['shipping']['city'],
				'ord_ship_state' => '',
				'ord_ship_post_code' => $order_data['shipping']['post_code'],
				'ord_ship_country' => $order_data['shipping']['country'],
				'ord_email' => $order_data['member_email'],
				'ord_phone' => $order_data['phone']
			);

			// Save cart and customer details.
			return $this->flexi_cart_admin->save_order($custom_summary_data);  
		}
		else
		{
			// Set validation errors.
			//$this->data['message'] = validation_errors('<p class="error_msg">', '</p>');
			Template::set_message(validation_errors(), 'error');			
			return FALSE;
		}
	}

}
