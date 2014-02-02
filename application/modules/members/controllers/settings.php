<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * settings controller
 */
class settings extends Admin_Controller
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

		$this->auth->restrict('Members.Settings.View');
		$this->load->model('members_model', null, true);
		$this->lang->load('members');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
		Template::set_block('sub_nav', 'settings/_sub_nav');

		Assets::add_module_js('members', 'members.js');
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
					$result = $this->members_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('members_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('members_delete_failure') . $this->members_model->error, 'error');
				}
			}
		}

		$records = $this->members_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Members');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Creates a Members object.
	 *
	 * @return void
	 */
	public function create()
	{
		$this->auth->restrict('Members.Settings.Create');

		if (isset($_POST['save']))
		{
			if ($insert_id = $this->save_members())
			{
				// Log the activity
				log_activity($this->current_user->id, lang('members_act_create_record') .': '. $insert_id .' : '. $this->input->ip_address(), 'members');

				Template::set_message(lang('members_create_success'), 'success');
				redirect(SITE_AREA .'/settings/members');
			}
			else
			{
				Template::set_message(lang('members_create_failure') . $this->members_model->error, 'error');
			}
		}
		Assets::add_module_js('members', 'members.js');

		Template::set('toolbar_title', lang('members_create') . ' Members');
		Template::render();
	}

	//--------------------------------------------------------------------


	/**
	 * Allows editing of Members data.
	 *
	 * @return void
	 */
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('members_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/members');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Members.Settings.Edit');

			if ($this->save_members('update', $id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('members_act_edit_record') .': '. $id .' : '. $this->input->ip_address(), 'members');

				Template::set_message(lang('members_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('members_edit_failure') . $this->members_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Members.Settings.Delete');

			if ($this->members_model->delete($id))
			{
				// Log the activity
				log_activity($this->current_user->id, lang('members_act_delete_record') .': '. $id .' : '. $this->input->ip_address(), 'members');

				Template::set_message(lang('members_delete_success'), 'success');

				redirect(SITE_AREA .'/settings/members');
			}
			else
			{
				Template::set_message(lang('members_delete_failure') . $this->members_model->error, 'error');
			}
		}
		Template::set('members', $this->members_model->find($id));
		Template::set('toolbar_title', lang('members_edit') .' Members');
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
	private function save_members($type='insert', $id=0)
	{
		if ($type == 'update')
		{
			$_POST['id'] = $id;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['firstname']        = $this->input->post('members_firstname');
		$data['lastname']        = $this->input->post('members_lastname');
		$data['email']        = $this->input->post('members_email');
		$data['pswd']        = $this->input->post('members_pswd');
		$data['dob']        = $this->input->post('members_dob') ? $this->input->post('members_dob') : '0000-00-00';
		$data['country']        = $this->input->post('members_country');
		$data['address1']        = $this->input->post('members_address1');
		$data['address2']        = $this->input->post('members_address2');
		$data['phone']        = $this->input->post('members_phone');
		$data['city']        = $this->input->post('members_city');
		$data['postal']        = $this->input->post('members_postal');
		$data['type']        = $this->input->post('members_type');

		if ($type == 'insert')
		{
			$id = $this->members_model->insert($data);

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
			$return = $this->members_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------


}