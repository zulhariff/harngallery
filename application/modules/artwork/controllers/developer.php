<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * developer controller
 */
class developer extends Admin_Controller
{

	//--------------------------------------------------------------------


	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Artwork.Developer.View');
		$this->load->model('artwork_model', null, true);
		$this->lang->load('artwork');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
			Assets::add_css('jquery-ui-timepicker.css');
			Assets::add_js('jquery-ui-timepicker-addon.js');
		Template::set_block('sub_nav', 'developer/_sub_nav');

		Assets::add_module_js('artwork', 'artwork.js');
	}

	//--------------------------------------------------------------------


	/**
	 * Displays a list of form data.
	 *
	 * @return void
	 */
	public function index()
	{

		// Deleting anything?
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->artwork_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('artwork_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('artwork_delete_failure') . $this->artwork_model->error, 'error');
				}
			}
		}

		$records = $this->artwork_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Artwork');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Creates a Artwork object.
	 *
	 * @return void
	 */
	public function create()
	{
		$this->auth->restrict('Artwork.Developer.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_artwork())
			{
				// Log the activity
				log_activity($this->current_user->id, lang('artwork_act_create_record') .': '. $insert_id .' : '. $this->input->ip_address(), 'artwork');

				Template::set_message(lang('artwork_create_success'), 'success');
				redirect(SITE_AREA .'/developer/artwork');
			}
			else
			{
				Template::set_message(lang('artwork_create_failure') . $this->artwork_model->error, 'error');
			}
		}
		Assets::add_module_js('artwork', 'artwork.js');

		Template::set('toolbar_title', lang('artwork_create') . ' Artwork');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Allows editing of Artwork data.
	 *
	 * @return void
	 */
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('artwork_invalid_id'), 'error');
			redirect(SITE_AREA .'/developer/artwork');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Artwork.Developer.Edit');

			if ($this->save_artwork('update', $id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('artwork_act_edit_record') .': '. $id .' : '. $this->input->ip_address(), 'artwork');

				Template::set_message(lang('artwork_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('artwork_edit_failure') . $this->artwork_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Artwork.Developer.Delete');

			if ($this->artwork_model->delete($id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('artwork_act_delete_record') .': '. $id .' : '. $this->input->ip_address(), 'artwork');

				Template::set_message(lang('artwork_delete_success'), 'success');

				redirect(SITE_AREA .'/developer/artwork');
			}
			else
			{
				Template::set_message(lang('artwork_delete_failure') . $this->artwork_model->error, 'error');
			}
		}
		Template::set('artwork', $this->artwork_model->find($id));
		Template::set('toolbar_title', lang('artwork_edit') .' Artwork');
		Template::render();
	}

	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/**
	 * Summary
	 *
	 * @param String $type Either "insert" or "update"
	 * @param Int	 $id	The ID of the record to update, ignored on inserts
	 *
	 * @return Mixed    An INT id for successful inserts, TRUE for successful updates, else FALSE
	 */
	private function save_artwork($type='insert', $id=0)
	{
		if ($type == 'update')
		{
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
		$data['size_id']        = $this->input->post('artwork_size_id');
		$data['color_id']        = $this->input->post('artwork_color_id');
		$data['height']        = $this->input->post('artwork_height');
		$data['width']        = $this->input->post('artwork_width');
		$data['dimension_unit']        = $this->input->post('artwork_dimension_unit');
		$data['framing']        = $this->input->post('artwork_framing');
		$data['keywords']        = $this->input->post('artwork_keywords');
		$data['curator_review']        = $this->input->post('artwork_curator_review');
		$data['status']        = $this->input->post('artwork_status');
		$data['date_uploaded']        = $this->input->post('artwork_date_uploaded') ? $this->input->post('artwork_date_uploaded') : '0000-00-00 00:00:00';

		if ($type == 'insert')
		{
			$id = $this->artwork_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			}
			else
			{
				$return = FALSE;
			}
		}
		elseif ($type == 'update')
		{
			$return = $this->artwork_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------


}