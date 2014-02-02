<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Newthisweek_model extends BF_Model {

	protected $table_name	= "bf_new_this_week";
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
	
	public function getAll($sort_by="id",$ad="asc",$start=0,$end=9999999999){
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
		INNER JOIN bf_new_this_week ON bf_artwork.id = bf_new_this_week.artwork_id 
		LEFT JOIN bf_staff_favourites ON bf_artwork.id= bf_staff_favourites.artwork_id 
		LEFT JOIN bf_featured ON bf_artwork.id = bf_featured.artwork_id 
		ORDER BY $sort_by $ad";
		if($end!=9999999999)
			$sql=$sql." LIMIT $start,$end";      		
		return $this->db->query($sql)->result();	
	}		
	public function addArtwork($id){
		$sql="INSERT INTO $this->table_name(artwork_id) VALUES (".$id.")";		
		$this->db->query($sql);	
	}
}
