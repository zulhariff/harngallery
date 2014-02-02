<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Art_sub_model extends BF_Model {

	protected $table_name	= "bf_artwork_submission";
	protected $key			= "id";
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
		array(
			"field"		=> "artwork1",
			"label"		=> "Artwork #1",
			"rules"		=> "required"
		),
		array(
			"field"		=> "artwork2",
			"label"		=> "Artwork #2",
			"rules"		=> "required"
		),
		array(
			"field"		=> "artwork3",
			"label"		=> "Artwork #3",
			"rules"		=> ""
		),
		array(
			"field"		=> "artwork4",
			"label"		=> "Artwork #4",
			"rules"		=> ""
		),
		array(
			"field"		=> "artwork5",
			"label"		=> "Artwork #5",
			"rules"		=> ""
		),
	);
	protected $insert_validation_rules 	= array();
	protected $skip_validation 			= FALSE;

	//--------------------------------------------------------------------
	public function ifExist($id){
		$sql="SELECT * FROM $this->table_name WHERE member_id=".$id;
		$query=$this->db->query($sql);	
		if ($query->num_rows() > 0)
			return true;
		return false;
	}
	public function ifApproved($id){
		$sql="SELECT * FROM $this->table_name WHERE member_id=".$id." AND approved=1";
		$query=$this->db->query($sql);	
		if ($query->num_rows() > 0)
			return true;
		return false;	
	}
	public function ifRejected($id){
		$sql="SELECT * FROM $this->table_name WHERE member_id=".$id." AND approved=0 AND status=1";
		$query=$this->db->query($sql);	
		if ($query->num_rows() > 0)
			return true;
		return false;	
	}	

	public function ifPending($id){
		$sql="SELECT * FROM $this->table_name WHERE member_id=".$id." AND status=0";
		$query=$this->db->query($sql);	
		if ($query->num_rows() > 0)
			return true;
		return false;	
	}
	public function getNoOfSubmission($id){
		$sql="SELECT * FROM $this->table_name WHERE member_id=".$id;
		$query=$this->db->query($sql);	
		return $query->num_rows();
	}
	public function reviewArtSub($id,$approved){
		//$approvelist=implode(",",$array);
		//$sql="UPDATE $this->table_name SET approved=$approved where member_id IN($approvelist)";
		$sql="UPDATE $this->table_name SET approved=$approved,reviewed=NOW(),status=1 where id=$id";
		$this->db->query($sql);
		return $this->getMembers($id);
	}
	public function getMembers($id){
		$sql="SELECT * FROM bf_members INNER JOIN 
		 $this->table_name ON bf_members.id=$this->table_name.member_id WHERE $this->table_name.id=$id";
		return $this->db->query($sql)->result();	
	}
	public function artSub_reviewed($type,$sort_by="created",$ad="desc",$start=0,$end=9999999999){
		$sql="SELECT CONCAT(firstname,' ',lastname) as name,email,reviewed,created,member_id,firstname,lastname,ban,iia,
		(SELECT COUNT(*) FROM bf_artwork WHERE user_id=bf_members.id AND deleteFlag=0) AS TotalArtwork,
		(SELECT COUNT(*) FROM order_details  INNER JOIN order_summary ON order_summary.ord_order_number=order_details.ord_det_order_number_fk
			WHERE order_details.ord_artist_id=bf_members.id AND order_summary.ord_status IN (3,4) ) AS TotalSales 
		 FROM bf_members INNER JOIN 
		 $this->table_name ON bf_members.id=$this->table_name.member_id 		 
		 WHERE $this->table_name.status=1 AND $this->table_name.approved=".$type." AND bf_members.ban=0 "; 
		$sql=$sql." ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";      	
		return $this->db->query($sql)->result();	
	}
	public function artSub_pendingList($sort_by="created",$ad="desc",$start=0,$end=9999999999){
		$sql="SELECT *,CONCAT(firstname,' ',lastname) as name FROM bf_members INNER JOIN 
		$this->table_name ON bf_members.id=$this->table_name.member_id WHERE $this->table_name.status=0 AND bf_members.ban=0 "; 
		$sql=$sql." ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";      	
		return $this->db->query($sql)->result();	
	}
	public function submitArtWork($id,$data){
		
		$sql="INSERT INTO $this->table_name(member_id,artwork1,artwork2,artwork3,artwork4,artwork5,approved,created)VALUES(".
			$id.",'".$data['artwork1']."','".$data['artwork2']."','".$data['artwork3']."','".$data['artwork4']."','".$data['artwork5']."',0,NOW())";
		$this->db->query($sql);							
	}
}
