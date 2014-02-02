<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Artwork_model extends BF_Model {

	protected $table_name	= "bf_artwork";
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
		
	);
	protected $insert_validation_rules 	= array();
	protected $skip_validation 			= FALSE;

	//--------------------------------------------------------------------
	public function getAll($sort_by="id",$ad="desc",$start=0,$end=9999999999){
		$sql = "SELECT bf_artwork.*, bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id,
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id
		LEFT JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 
		WHERE bf_artwork.deleteFlag=0 AND bf_members.ban=0 
		ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";      		
		return $this->db->query($sql)->result();	
	}
		public function getAll_exclude_IIA($sort_by="id",$ad="desc",$start=0,$end=9999999999){
		$sql = "SELECT bf_artwork.*, bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id,
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id
		LEFT JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 
		WHERE bf_artwork.deleteFlag=0 AND bf_members.ban=0 AND iia=0
		ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";      		
		return $this->db->query($sql)->result();	
	}
	public function search($searchString,$start=0,$end=9999999999){
		$sql = "SELECT bf_artwork.*, bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id,
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id
		LEFT JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 
		WHERE bf_artwork.deleteFlag=0 AND bf_members.ban=0 
		AND (
			bf_members.firstname like '%$searchString%' OR 
			bf_members.lastname like '%$searchString%' OR 
			bf_members.about like '%$searchString%' OR 
			bf_members.email like '%$searchString%' OR 
			bf_artwork.title like '%$searchString%' OR 
			bf_artwork.description like '%$searchString%' OR 
			bf_artwork.keywords like '%$searchString%'
			)
		";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";      		
		return $this->db->query($sql)->result();	
	}
	
	public function getPurchases($buyer_id,$sort_by="id",$ad="desc",$start=0,$end=9999999999){
		//TODO Add inner join to the sales table
		$sql = "SELECT bf_artwork.*, bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id,
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id
		LEFT JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 
		INNER JOIN order_details ON order_details.ord_det_item_fk=bf_artwork.id  
		INNER JOIN order_summary ON order_details.ord_det_order_number_fk=order_summary.ord_order_number 
		WHERE order_summary.ord_collector=$buyer_id AND order_summary.ord_status IN (3,4) 
		ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";      		
		return $this->db->query($sql)->result();	
	}	
	public function getByArtist($user_id,$exclude_id=0,$start=0,$end=9999999999){
		//$sql="SELECT * FROM $this->table_name";
		$sql = "SELECT bf_artwork.*,bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo, bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id 
        WHERE bf_artwork.deleteFlag=0  AND bf_members.ban=0 AND bf_members.id = ".$user_id;
		if($exclude_id){
			$sql=$sql." AND bf_artwork.id NOT IN (".$exclude_id.") ";
		} 		
		$sql=$sql." ORDER BY id desc";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";       
		return $this->db->query($sql)->result();	
	}		
	public function getByArtist2($user_id,$sort_by="id",$ad="desc",$start=0,$end=9999999999){
		$sql = "SELECT bf_artwork.*, bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id,
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id
		LEFT JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 
		WHERE bf_artwork.deleteFlag=0 AND bf_members.ban=0  AND bf_members.id = ".$user_id;
		$sql=$sql." ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";      		
		return $this->db->query($sql)->result();	
	}
	public function getItem($item_id){
		$sql = "SELECT bf_artwork.*, bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,bf_members.ship_type,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id,
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id
		LEFT JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 
		WHERE bf_artwork.deleteFlag=0  AND bf_members.ban=0  AND bf_artwork.id =".$item_id;				
		$result= $this->db->query($sql)->result();			
		return $result[0];		
	}
	public function getItem2($item_id){
		$sql = "SELECT bf_artwork.*,bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id,
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id
		LEFT JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 
		WHERE bf_artwork.deleteFlag=0  AND bf_members.ban=0  AND bf_artwork.id =".$item_id;		
		$result= $this->db->query($sql)->result();			
		return $result;
	}	
	
	public function getAllArtworks($sort_by="id",$ad="desc",$start=0,$end=9999999999){
		$sql = "SELECT bf_artwork.*,bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id 
		WHERE bf_artwork.deleteFlag=0  AND bf_members.ban=0 
		ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";
		return $this->db->query($sql)->result();	
	}
	public function getPopular($sort_by="id",$ad="asc",$start=0,$end=9999999999){
		$sql = "SELECT bf_artwork.*,bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id AND bf_visits.created > DATE_SUB(bf_visits.created,INTERVAL 7 DAY) ) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id 
		WHERE bf_artwork.deleteFlag=0 AND bf_members.ban=0  		
		ORDER BY $sort_by $ad ";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";
		$sql="SELECT * FROM (".$sql.") AS a WHERE visits > 0";
		return $this->db->query($sql)->result();	

	}	
	public function getNewThisWeek($sort_by="id",$ad="desc",$start=0,$end=9999999999){
		$sql = "SELECT bf_artwork.*,bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id , 
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id
		INNER JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 
		WHERE bf_artwork.deleteFlag=0 AND bf_members.ban=0  
		ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";
		return $this->db->query($sql)->result();	
	}	
	public function getStaffFavourites($sort_by="id",$ad="desc",$start=0,$end=9999999999){
		$sql = "SELECT bf_artwork.*,bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id , 
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id
		LEFT JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		INNER JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 
		WHERE bf_artwork.deleteFlag=0  AND bf_members.ban=0  
		ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";
		return $this->db->query($sql)->result();	
	}
	public function getFeatured($sort_by="id",$ad="desc",$start=0,$end=9999999999){
		$sql = "SELECT bf_artwork.*,bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id , 
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id
		LEFT JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		INNER JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id  
		WHERE bf_artwork.deleteFlag=0 AND bf_members.ban=0 
		ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";
		return $this->db->query($sql)->result();	
	}
	public function getUnder500($sort_by="id",$ad="desc",$start=0,$end=9999999999){
		$sql = "SELECT bf_artwork.*,bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id , 
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id
		LEFT JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 
		WHERE bf_artwork.deleteFlag=0  AND bf_members.ban=0  AND bf_artwork.price < 800
		ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";
		return $this->db->query($sql)->result();	
	}

	public function getFavouriteArt($member_id,$sort_by="id",$ad="desc",$start=0,$end=9999999999){
		$sql = "SELECT bf_artwork.*,bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id 
		INNER JOIN bf_favourite_art ON bf_artwork.id = bf_favourite_art.artwork_id 
		WHERE bf_artwork.deleteFlag=0 AND bf_members.ban=0 
		AND bf_favourite_art.member_id=$member_id
		ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";
		return $this->db->query($sql)->result();	
	}

	public function searchArtwork($cat_id,$style_id,$medium_id,$color_id,$subject_id,$price,$orientation,$size,$location){
		$sql = "SELECT bf_artwork.*,bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id , 
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id ";
		if($cat_id==0)
			$sql.="LEFT JOIN";
		else
			$sql.="INNER JOIN"; 
		$sql.=" art_category ON bf_artwork.cat_id = art_category.id ";
		if($style_id==0)
			$sql.="LEFT JOIN";
		else
			$sql.="INNER JOIN";
		$sql.=" art_style ON bf_artwork.style_id=art_style.id ";
		if($medium_id==0)
			$sql.="LEFT JOIN";
		else
			$sql.="INNER JOIN";
		$sql.=" art_medium ON bf_artwork.medium_id=art_medium.id ";
		if($color_id==0)
			$sql.="LEFT JOIN";
		else
			$sql.="INNER JOIN";
		$sql.=" art_color ON bf_artwork.color_id=art_color.id 
		LEFT JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 		
		WHERE bf_artwork.deleteFlag=0  AND bf_members.ban=0 ";
		if($price!=0)
			$sql.="AND bf_artwork.price < 500";
		return $this->db->query($sql)->result();	
	}	
	public function browseArtSearch($category=0,$price=0,$medium=0,$orientation=0,$style=0,$subject=0,$size=0,$color=0,$location=0,$searchStr='',$sort_by="id",$ad="desc",$start=0,$end=9999999999){
		$sql = "SELECT bf_artwork.*, bf_members.iia,bf_members.iia_photo,bf_members.iia_desc,
		bf_members.firstname,bf_members.lastname,bf_members.about,bf_members.country,bf_members.photo as member_photo,bf_members.email,bf_members.id as member_id,
		art_category.name as category, 
		art_style.name as style,
		art_medium.name as medium,
		art_color.name as color,
		bf_new_this_week.id as new_this_week_id,
		bf_staff_favourites.id as staff_favourites_id,
		bf_featured.id as featured_id,
		(SELECT COUNT(*) FROM bf_visits WHERE bf_visits.artwork_id=bf_artwork.id) as visits
		FROM bf_artwork 
		INNER JOIN bf_members ON bf_artwork.user_id = bf_members.id 
		LEFT JOIN art_category ON bf_artwork.cat_id = art_category.id 
		LEFT JOIN art_style ON bf_artwork.style_id=art_style.id 
		LEFT JOIN art_medium ON bf_artwork.medium_id=art_medium.id
		LEFT JOIN art_color ON bf_artwork.color_id=art_color.id
		LEFT JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 
		WHERE bf_artwork.deleteFlag=0 AND bf_members.ban=0"; 
		if($category!=0)
			$sql.=" AND bf_artwork.cat_id=$category ";
		if($price != 0){
			switch ($price) {
				case 1:
					$sql.=" AND bf_artwork.price < 99 ";
					break;
				case 2:
					$sql.=" AND bf_artwork.price BETWEEN 100 AND 499 ";
					break;
				case 3:
					$sql.=" AND bf_artwork.price BETWEEN 500 AND 999 ";
					break;
				case 4:
					$sql.=" AND bf_artwork.price BETWEEN 1000 AND 2499 ";
					break;
				case 5:
					$sql.=" AND bf_artwork.price > 2500 ";
					break;				
				default:
					$sql.=" AND bf_artwork.price < 99 ";
					break;
			}
		}
		if($medium!=0)
			$sql.=" AND bf_artwork.medium_id=$medium ";
		if($orientation!=0)
			$sql.=" AND bf_artwork.orientation_id=$orientation ";
		if($style!=0)
			$sql.=" AND bf_artwork.style_id=$style ";
		if($subject!=0)
			$sql.=" AND bf_artwork.subject_id=$subject ";
		if($size!=0){
			switch ($size) {
				case 1:
					$sql.=" AND bf_artwork.area < 3000 ";
					break;
				case 2:
					$sql.=" AND bf_artwork.area BETWEEN 3000 AND 15000 ";
					break;
				case 3:
					$sql.=" AND bf_artwork.area > 15000 ";
					break;		
				default:
					$sql.=" AND bf_artwork.area < 3000 ";
					break;
			}			
		}
		if($color!=0)
			$sql.=" AND bf_artwork.color_id=$color ";
		if($location!=0 && $location!=1){
			switch ($location) {
				case 2:
					$sql.=" AND bf_members.country IN ('BI','KM','DJ','ER','ET','KE','MG','MW','MU','MZ','RE','RW','SC','SO','TZ','UG','ZM','ZW','AO','CM','CF','TD','CG','CD','GQ','GA','ST','DZ','EG','LY','MA','SD','TN','EH','BW','LS','NA','ZA','SZ','BJ','BF','CV','CI','GM','GH','GN','GW','LR','ML','MR','NE','NG','SH','SN','SL','TG') ";// Africa
					break;
				case 3:
					$sql.=" AND bf_members.country IN ('AI','AG','AW','BS','BB','BM','VG','KY','CU','DM','DO','GD','GP','HT','JM','MQ','MS','AN','PR','KN','LC','VC','TT','VI','BZ','CR','SV','GT','HN','NI','PA','AR','BO','BR','CL','CO','EC','GF','PY','PE','SR','UY','VE','CA','MX','US') ";// America
					break;
				case 4:
					$sql.=" AND bf_members.country IN ('CN','HK','MO','JP','KP','KR','MN','TW','RU','AF','BD','BT','IN','IR','KZ','KG','MV','NP','PK','TJ','TM','UZ','BN','KH','ID','LA','MY','MM','PH','SG','TH','TL','VN','AM','AZ','BH','CY','GE','IQ','IL','JO','KW','LB','OM','PS','QA','SA','SY','TR','AE','YE') ";// Asia
					break;
				case 5:
					$sql.=" AND bf_members.country IN ('AU','CX','CC','NZ','NF','FJ','NC','PG','SB','VU','FM','GU','MH','NR','MP','PW','AS','CK','PF','HI','NU','PN','WS','TK','TO','TV','WF') ";// Australia/Ocenia
					break;
				case 6:
					$sql.=" AND bf_members.country IN ('BY','BG','CZ','HU','MD','PL','RO','RU','SK','UA','DK','EE','FO','FI','GL','IS','IE','LV','LT','NO','SE','GB','AL','AD','BA','HR','CY','GI','GR','VA','IT','MK','MT','CS','PT','SM','SI','ES','TR','AT','BE','FR','DE','LI','LU','MC','NL','CH') ";// Europe
					break;				
				default:
					$sql.=" AND bf_members.country = '$location'";
					break;
			}
		}else{
			if($location!='0' && $location !='1'){
				$sql.=" AND bf_members.country = '$location'";
			}
		}			
		if($searchStr!=''){
			$sql.=" AND (
			bf_members.firstname like '%$searchStr%' OR 
			bf_members.lastname like '%$searchStr%' OR 
			bf_members.about like '%$searchStr%' OR 
			bf_members.email like '%$searchStr%' OR 
			bf_artwork.title like '%$searchStr%' OR 
			bf_artwork.description like '%$searchStr%' OR 
			bf_artwork.keywords like '%$searchStr%'
			)";		
		}
		$sql.=" ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql.=" LIMIT $start,$end";      			
		//echo $sql;	
		return $this->db->query($sql)->result();	
	}
	public function getUserSortOrder(){
		$sql = "SELECT m.id,MAX(a.uploaded) as uploaded FROM bf_members m
		INNER JOIN bf_artwork a ON m.id=a.user_id 
		WHERE m.ban=0 
		GROUP BY m.id ORDER BY uploaded desc";
		return $this->db->query($sql)->result();	
	}
	public function getByArtistNoSort($artist_id){
		$sql = "SELECT id FROM bf_artwork WHERE user_id=".$artist_id;
		$sql.=" AND sort=0 AND deleteFlag=0 ORDER BY uploaded desc LIMIT 1";
		return $this->db->query($sql)->result();	
	}
}
