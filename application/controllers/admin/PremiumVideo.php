<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PremiumVideo extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->checkSessionAdmin())
		{
			if($this->admin_id)
			{
				if($this->admin_id == 1 || $this->admin_id == 2)
				{
					
				}
				else
				{
					$admin_detaiss = $this->db->get_where('admin', array('admin_id'=>$this->admin_id))->row();
					if($admin_detaiss)
					{
						$admin_role = unserialize($admin_detaiss->admin_role);
						if(in_array('PremiumVideo', $admin_role))
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
		}
	}
	
	/**
	| Index function for this controller
	*/
	public function index()
	{		
		if($this->checkSessionAdmin())
		{
			$this->data['video_list'] = $this->db->get_where('premium_video')->result();
			$this->show_viewAdmin('admin/premiumVideo', $this->data);
		}
		else
		{
			$this->load->view('admin/login');
		}
    }
	
	/**
	| Add update video section
	*/
	public function videoSection($id = null)
	{
		if($this->checkSessionAdmin())
		{
			if($id)
			{
				if(isset($_POST['update']) && $_POST['update'] == 'Update')
				{
					$dataPost['title'] = $this->input->post('title');
					$url = $this->input->post('url');					
					/*
					if(!empty($_FILES["short_video"]["name"]))
					{							
						$video = 'Video';
						$fieldNameVideo = "short_video";						
						$videoPath = 'evoai/public/webroot/frontend/videos/';	
						$videoName = $this->VideoUpload($_FILES["short_video"]["name"], $video, $videoPath, $fieldNameVideo);
						$dataPost['short_video'] = $videoName;								
					}
					*/
					if(!empty($_FILES["full_video"]["name"]))
					{							
						$video = 'Video';
						$fieldNameVideo = "full_video";						
						$videoPath = 'evoai/public/webroot/frontend/videos/';	
						$videoName = $this->VideoUpload($_FILES["full_video"]["name"], $video, $videoPath, $fieldNameVideo);
						$dataPost['full_video'] = $videoName;								
					}
					else
					{
						if($url)
						{
							$dataPost['url'] = $url;
							$dataPost['full_video'] = '';
						}
					}
					$this->db->where('id', $id);
					$this->db->update('premium_video', $dataPost);
					
					$msg = 'Video details update successfully!';
					$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url().'admin/premiumVideo'); 					
				}
				else
				{ 
					$this->data['video_details'] = $this->db->get_where('premium_video', array('id'=>$id))->row();
					$this->show_viewAdmin('admin/premiumVideoUpdate', $this->data);
				}
			}
			else
			{
				if(isset($_POST['submit']) && $_POST['submit'] == 'Submit')
				{
					$this->form_validation->set_rules('title', 'title', 'required');
					$dataPost['title'] = $this->input->post('title');					
					if ($this->form_validation->run() == FALSE)
					{					
						$this->show_viewAdmin('admin/premiumVideoAdd');                    
					}
					else
					{
						$url = $this->input->post('url');						
						/*
						if(!empty($_FILES["short_video"]["name"]))
						{							
							$video = 'Video';
							$fieldNameVideo = "short_video";						
							$videoPath = 'evoai/public/webroot/frontend/videos/';	
							$videoName = $this->VideoUpload($_FILES["short_video"]["name"], $video, $videoPath, $fieldNameVideo);
							$dataPost['short_video'] = $videoName;								
						}
						*/
						if(!empty($_FILES["full_video"]["name"]))
						{							
							$video = 'Video';
							$fieldNameVideo = "full_video";						
							$videoPath = 'evoai/public/webroot/frontend/videos/';	
							$videoName = $this->VideoUpload($_FILES["full_video"]["name"], $video, $videoPath, $fieldNameVideo);
							$dataPost['full_video'] = $videoName;								
						}
						if($url)
						{
							$dataPost['url'] = $url;
						}
						$this->db->insert('premium_video', $dataPost);
						$last_id = $this->db->insert_id();						
						$msg = 'Video details stored successfully';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url('admin/premiumVideo')); 
					}									
				}
				else
				{
					$this->show_viewAdmin('admin/premiumVideoAdd');
				}
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
	}
	
	/* Delete user */
	public function delete_detail($id = null)
	{
		if($this->checkSessionAdmin())
		{
			$this->Comman_model->delete_detail('premium_video', 'id', $id);
			
			$msg = 'Video detail remove successfully.';					
			$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
			redirect(base_url().'admin/premiumVideo');
		}
		else
		{
			$this->load->view('admin/login');
		}		
	}
	
	/* Set Active / Inactive Status */
	public function setStatus()
	{
		if($this->checkSessionAdmin())
		{
			$id = $this->input->post('id');
			$post['status'] = $this->input->post('status');
			$this->Comman_model->update_details('premium_video', $post, 'id', $id);
			echo 1 ;
			exit();
		}
		else
		{
			redirect(base_url().'admin');
		}
	}
}

/* End of file */