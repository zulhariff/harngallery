<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Orders_model extends BF_Model {

	protected $table_name	= "order_summary";
	protected $key			= "ord_order_number";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";

	protected $log_user 	= FALSE;

	protected $set_created	= false;
	protected $set_modified = false;

	/*
		Customize the operations of the model without recreating the insert, update,
		etc methods by adding the method names to act as callbacks here.
	 */
	protected $before_insert 	= array();
	protected $after_insert 	= array();
	protected $before_update 	= array();
	protected $after_update 	= array();
	protected $before_find 		= array();
	protected $after_find 		= array();
	protected $before_delete 	= array();
	protected $after_delete 	= array();

	/*
		For performance reasons, you may require your model to NOT return the
		id of the last inserted row as it is a bit of a slow method. This is
		primarily helpful when running big loops over data.
	 */
	protected $return_insert_id 	= TRUE;

	// The default type of element data is returned as.
	protected $return_type 			= "object";

	// Items that are always removed from data arrays prior to
	// any inserts or updates.
	protected $protected_attributes = array();

	/*
		You may need to move certain rules (like required) into the
		$insert_validation_rules array and out of the standard validation array.
		That way it is only required during inserts, not updates which may only
		be updating a portion of the data.
	 */
	protected $validation_rules 		= array(
		
	);
	protected $insert_validation_rules 	= array();
	protected $skip_validation 			= FALSE;
	
	public function getAll(){
		$sql="SELECT * FROM $this->table_name ORDER BY id";
		return $this->db->query($sql)->result();	
	}	

	public function getOrderDetails($order_id){
		$sql = "SELECT *,d.ord_artist_name,d.ord_artist_email,d.ord_artist_country,ord_det_price 
		FROM order_summary s
		INNER JOIN 
		order_details d ON d.ord_det_order_number_fk=s.ord_order_number 
		WHERE s.ord_order_number=".$order_id;
		return $this->db->query($sql)->result();	
	}

	public function getSales(){
		$sql = "SELECT *,d.ord_artist_name,d.ord_artist_email,d.ord_artist_country,ord_det_price 
		FROM order_summary s
		INNER JOIN 
		order_details d ON d.ord_det_order_number_fk=s.ord_order_number WHERE ord_status NOT IN (1,2) ORDER BY ord_date DESC";
		return $this->db->query($sql)->result();	
	}
	public function getPurchase($buyer_id){
	$sql = "SELECT *,d.ord_artist_name,d.ord_artist_email,d.ord_artist_country,ord_det_price 
		FROM order_summary s
		INNER JOIN order_details d ON d.ord_det_order_number_fk=s.ord_order_number 
		WHERE s.ord_collector=".$buyer_id." ORDER BY ord_date DESC";
		return $this->db->query($sql)->result();		
	}
	public function getSalesByArtist($artist_id){
	$sql = "SELECT *,d.ord_artist_name,d.ord_artist_email,d.ord_artist_country,ord_det_price 
		FROM order_summary s
		INNER JOIN order_details d ON d.ord_det_order_number_fk=s.ord_order_number 
		WHERE d.ord_artist_id=".$artist_id." ORDER BY ord_date DESC";
		return $this->db->query($sql)->result();		
	}
}
