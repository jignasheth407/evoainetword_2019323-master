<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Posts
 * 
 * Admin Posts Controller Class
 *
 * @access  public
 * @author  Enliven Applications
 * @version 3.0
 * 
*/
class Admin_posts extends OB_AdminController {

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
		
		if ( ! $this->ion_auth->has_permission('posts'))
		{
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		
		
		$this->template->append_js('ie10-viewport-bug-workaround.js');

		$this->load->model('Admin_posts_m');
		//$this->load->model('ion_auth_model');

		$this->template->set('active_link', 'posts');

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
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


	}

	/**
     * index
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
			$this->data['posts'] = $this->Admin_posts_m->get_posts();
			$this->show_viewAdmin('admin/posts', $this->data);			
		}
		else
		{
			$this->load->view('admin/login');
		}
		//$this->template->build('admin/posts/index', $this->data);
	}


	/**
     * add_post
     *
     * @access  public
     * @author  Enliven Applications
     * @version 3.0
     * 
     * @return  null
     */
	public function add_post()
	{	
		if($this->checkSessionAdmin())
		{
			$this->template->append_css('markdown.min.css');
			$this->template->append_js('markdown.min.js');

			// get categories
			$this->data['cats'] = $this->Admin_posts_m->get_cats_form();
			
			if ($this->input->post())
			{
				$this->form_validation->set_rules('title', lang('post_form_title_text'), 'required');
				$this->form_validation->set_rules('status', lang('post_form_status_text'), 'required|in_list[draft,published]');
				$this->form_validation->set_rules('content', lang('post_form_content_text'), 'required');
				$this->form_validation->set_rules('excerpt', lang('post_form_excerpt_text'), 'required');
				$this->form_validation->set_rules('cats[]', lang('cats_hdr'), 'required');
				$this->form_validation->set_rules('url_title', lang('post_form_title_text'), 'required|alpha_dash|is_unique[posts.url_title]');
				
				$build_slug = true;
				// Did an advanced user enter the url_title/slug?
				if ($this->input->post('url_title'))
				{	
					// yup, so lets validate that...
					$this->form_validation->set_rules('url_title', lang('post_form_title_text'), 'required|alpha_dash|is_unique[posts.url_title]');
					$build_slug = false;
				}
			}

			// did they pass validations?
			if ($this->form_validation->run() == TRUE)
			{					
				// yes, so we'll start.
				$post_data = $this->input->post();

				/*
				// did they upload a feature image?
				if ($_FILES['feature_image'])
				{
					/*
					$config['upload_path']          = '/webroot/admin/upload/';
					$config['allowed_types']        = 'gif|jpg|png|mp4|mpeg|mpg';

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('feature_image'))
					{
						$this->data['message'] = $this->upload->display_errors();
						$this->show_viewAdmin('admin/postsUpdate', $this->data); 
					}
					else
					{
						$img_data = $this->upload->data();
						$post_data['feature_image'] = $img_data['file_name'];						
					}
					*//*
					$imagePath = 'webroot/admin/upload/';
					$img_name = 'feature_image';
					$fileName = $_FILES["feature_image"]["name"];
					$fieldName = "feature_image";
					$imageName = $this->ImageUpload($fileName, $img_name, $imagePath, $fieldName);	
					if($imageName != '')
					{
						$post_data['feature_image'] = $imageName;
					}					
				}
				*/
				$imagePath = 'webroot/admin/upload/';
				$img_name = 'feature_image';
				$fileName = $_FILES["feature_image"]["name"];
				$fieldName = "feature_image";
				$imageName = $this->ImageUpload($fileName, $img_name, $imagePath, $fieldName);	
				if($imageName != '')
				{
					$post_data['feature_image'] = $imageName;
				}	
				// do we need to build the slug/url_title?
				if ($build_slug)
				{
					$config = [
						'field' => 'url_title',
						'title' => $post_data['title'],
						'table' => 'posts'
					];
					$this->load->library('slug', $config);
					$post_data['url_title'] = $this->slug->create_uri($post_data['title']);					
				}

				// get author info
				//$post_data['author'] 	= $this->ion_auth->get_user_id();
				$post_data['author'] 	= $this->admin_id;

				// the date
				$post_data['date_posted']		= date('Y-m-d');

				// do the insert
				if ($this->Admin_posts_m->add_post($post_data))
				{
					// add the categories					
					// succeeded
					$this->session->set_flashdata('success', lang('post_added_success_resp'));
					redirect('admin/admin_posts');
				}
				// failed
				$this->data['message'] = lang('post_added_fail_resp');
				$this->show_viewAdmin('admin/postsAdd', $this->data); 
			}
			$this->show_viewAdmin('admin/postsAdd', $this->data);  
		}
		else
		{
			$this->load->view('admin/login');
		}				    
	}

	/**
     * edit_post
     *
     * @access  public
     * @author  Enliven Applications
     * @version 3.0
     * 
     * @param  string $id the post ID
     * 
     * @return  null
     */
	public function edit_post($id)
	{
		if($this->checkSessionAdmin())
		{
			$this->template->append_css('markdown.min.css');
			$this->template->append_js('markdown.min.js');

			$this->data['post'] = $this->Admin_posts_m->get_post($id);
			
			if ($this->input->post())
			{
				// set default for changing url_title
				$new_slug = false;

				$this->form_validation->set_rules('title', lang('post_form_title_text'), 'required');
				$this->form_validation->set_rules('status', lang('post_form_status_text'), 'required|in_list[draft,published]');
				$this->form_validation->set_rules('content', lang('post_form_content_text'), 'required');
				$this->form_validation->set_rules('excerpt', lang('post_form_excerpt_text'), 'required');
				
				// does the old url_title match the one from the form?
				if ($this->input->post('url_title') != $this->data['post']['url_title'])
				{	
					// they do not, set $new_slug true
					// and validation rules.
					$new_slug = true;
					$this->form_validation->set_rules('url_title', lang('post_form_title_text'), 'required|alpha_dash|is_unique[posts.url_title]');
					$this->form_validation->set_rules('redirection', lang('post_form_redirect_text'), 'required|in_list[none,301,302]');
				}
			}

			// did they pass validations?
			if ($this->form_validation->run() == TRUE)
			{
				// yes, so we'll start updating.
				$post_data = $this->input->post();

				// did they upload a feature image?
				/*
				if ($_FILES['feature_image'])
				{
					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = 'gif|jpg|png|mp4|mpeg|mpg';

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('feature_image'))
					{
						$this->data['message'] = $this->upload->display_errors();

						//$this->template->build('admin/posts/edit_post', $data); 
						$this->show_viewAdmin('admin/postsUpdate', $this->data); 						
					}
					else
					{
						$img_data = $this->upload->data();

						$post_data['feature_image'] = $img_data['file_name'];
						
					}
				}
				*/
				$imagePath = 'webroot/admin/upload/';
				$img_name = 'feature_image';
				$fileName = $_FILES["feature_image"]["name"];
				$fieldName = "feature_image";
				$imageName = $this->ImageUpload($fileName, $img_name, $imagePath, $fieldName);	
				if($imageName != '')
				{
					$post_data['feature_image'] = $imageName;
				}	
				// get the redirect out of the update data
				$redirect_val = $this->input->post('redirection');
				unset($post_data['redirection']);

				// determine if we're doing the new_slug/url_title thing
				// and redirection...
				if ($new_slug)
				{
					// determine what they want to do about the old
					// slug and if we should redirect.
					switch ($redirect_val) {
						case 'none':
							// they're don't want redirection... bounce
							break;
						case '301' || '302':
							// set_redirect($old_slug, $new_slug, type=posts|post, $code)
							$this->obcore->set_redirect($data['post']['url_title'], $post_data['url_title'], 'post', $redirect_val);
							break;
						default:
							// set_redirect($old_slug, $new_slug, type=posts|post, $code)
							$this->obcore->set_redirect($data['post']['url_title'], $post_data['url_title'], 'post', '301');
							break;
					}
				}

				// do the update
				if ($this->Admin_posts_m->update_post($id, $post_data))
				{
					// succeeded
					$this->session->set_flashdata('success', lang('post_update_success_resp'));
					redirect('admin/admin_posts');
				}
				// failed
				$this->data['message'] = lang('post_update_fail_resp');
				//$this->template->build('posts/edit_post', $data); 
				$this->show_viewAdmin('admin/postsUpdate', $this->data); 
			}
			//$this->template->build('admin/posts/edit_post', $data); 
			$this->show_viewAdmin('admin/postsUpdate', $this->data); 
		}
		else
		{
			$this->load->view('admin/login');
		}		
	}

	/**
     * remove_post
     *
     * @access  public
     * @author  Enliven Applications
     * @version 3.0
     * 
     * @param  string $id the post ID
     * 
     * @return  null
     */
	public function remove_post($id)
	{
		if($this->checkSessionAdmin())
		{			
			if($this->Admin_posts_m->remove_post($id))
			{		
				$msg = 'Posts detail remove successfully.';					
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/admin_posts');
			}
			else
			{
				$this->session->set_flashdata('message', lang('post_removed_fail_resp'));
				redirect(base_url().'admin/admin_posts'); 
			}
		}
		else
		{
			redirect(base_url().'admin');
		}			
	}
}
