<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin_cats
 * 
 * Admin Categories Controller Class
 *
 * @access  public
 * @author  Enliven Applications
 * @version 3.0
 * 
*/
class Admin_cats extends OB_AdminController 
{

	/**
     * Construct
     *
     * @access  public
     * @author  Enliven Applications
     * @version 3.0
     * 
     * @return  null
     */
	public function __construct()
	{
		parent::__construct();

		// does the user have permission to 
		// view/use this method?
		if ( ! $this->ion_auth->has_permission('posts'))
		{
			// curbed!
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}
		
		// template stuff
		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		$this->template->append_js('ie10-viewport-bug-workaround.js');
		$this->template->set('active_link', 'cats');

		// load all the things
		$this->load->model('Admin_cats_m');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);
		if($this->checkSessionAdmin())
		{
			if($this->admin_id)
			{
				$admin_detaiss = $this->db->get_where('admin', array('admin_id'=>$this->admin_id))->row();
				if($admin_detaiss)
				{
					$admin_role = unserialize($admin_detaiss->admin_role);
					if(in_array('Blog', $admin_role))
					{
						return true;
					}
					else						
					{
						redirect(base_url().'admin/dashboard/notPermitted');						
					}
				}
				else
				{
					return false;
					redirect(base_url().'admin/dashboard/notPermitted');
				}
			}
		}
		// set validation error
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
	}

	/**
     * Index
     *
     * @access  public
     * @author  Enliven Applications
     * @version 3.0
     * 
     * @return  null
     */
	public function index()
	{
		if($this->checkSessionAdmin())
		{
			$this->data['cats'] = $this->Admin_cats_m->get_cats();
			$this->show_viewAdmin('admin/cats', $this->data);		
		}
		else
		{
			$this->load->view('admin/login');
		}
		// get the categories
		//$data['cats'] = $this->Admin_cats_m->get_cats();
		//build it
		//$this->template->build('admin/cats/index', $data);
	}


	/**
     * add_cat
     * 
     * Add Category
     *
     * @access  public
     * @author  Enliven Applications
     * @version 3.0
     * 
     * @return  null
     */
	public function add_cat()
	{
		if($this->checkSessionAdmin())
		{			
			if ($this->input->post())
			{
				$this->form_validation->set_rules('name', lang('cat_form_name'), 'required');
				$this->form_validation->set_rules('url_name', lang('cat_form_url'), 'required');
				$this->form_validation->set_rules('description', lang('cat_form_desc'), 'required');
			}

			// pass vaidation?
			if ($this->form_validation->run() == TRUE)
			{
				// yep.  Add it.
				if ($this->Admin_cats_m->add_cat($this->input->post()))
				{
					// succeeded
					$this->session->set_flashdata('message', lang('cat_added_success_resp'));
					redirect('admin/admin_cats');
				}
				// failed
				$this->data['message'] = lang('cat_added_fail_resp');
				//$this->template->build('admin/cats/add_cat'); 				
				$this->show_viewAdmin('admin/catsAdd', $this->data); 				
			}
			// no form submit, show the form
			//$this->template->build('admin/cats/add_cat');  
			$this->data = '';
			$this->show_viewAdmin('admin/catsAdd', $this->data); 		
		}
		else
		{
			redirect(base_url().'admin');
		}
	}

	/**
     * edit_cat
     * 
     * Edit Category
     *
     * @access  public
     * @author  Enliven Applications
     * @version 3.0
     * 
     * @param  string $id the category id in the database
     * 
     * @return  null
     */
	public function edit_cat($id)
	{
		if($this->checkSessionAdmin())
		{			
			// get the category we're editing
			$this->data['cat'] = $this->Admin_cats_m->get_cat($id);

			// did we have a form submit?
			if ($this->input->post())
			{
				// yup, set validation rules
				$this->form_validation->set_rules('name', lang('cat_form_name'), 'required');
				$this->form_validation->set_rules('url_name', lang('cat_form_url'), 'required');
				$this->form_validation->set_rules('description', lang('cat_form_desc'), 'required');
			}

			// did validation pass?
			if ($this->form_validation->run() == TRUE)
			{
				// yup, update the category
				if ($this->Admin_cats_m->update_cat($id, $this->input->post()))
				{
					// succeeded
					$this->session->set_flashdata('message', lang('cat_update_success_resp'));
					redirect('admin/admin_cats');
				}
				// failed
				$this->data['message'] = lang('cat_update_fail_resp');
				//$this->template->build('admin/cats/edit_cat', $data); 
				$this->show_viewAdmin('admin/catsUpdate', $this->data); 		
			}
			// no form submit, show the form
			//$this->template->build('admin/cats/edit_cat', $data);    
			$this->show_viewAdmin('admin/catsUpdate', $this->data); 		
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}

	/**
     * remove_cat
     * 
     * Remove Category
     *
     * @access  public
     * @author  Enliven Applications
     * @version 3.0
     * 
     * @param  string $id the category id in the database
     * 
     * @return  null
     */
	public function remove_cat($id)
	{		
		if($this->checkSessionAdmin())
		{			
			if ($this->Admin_cats_m->remove_cat($id))
			{		
				$msg = 'Categories detail remove successfully.';					
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/admin_cats');
			}
			else
			{
				$this->session->set_flashdata('message', lang('cat_removed_fail_resp'));
				redirect(base_url().'admin/admin_cats'); 
			}
		}
		else
		{
			redirect(base_url().'admin');
		}	
	}
}
