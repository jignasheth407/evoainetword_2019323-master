<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcements extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->checkSessionAdmin())
		{
			if($this->admin_id)
			{
				$admin_detaiss = $this->db->get_where('admin', array('admin_id'=>$this->admin_id))->row();
				if($admin_detaiss)
				{
					$admin_role = unserialize($admin_detaiss->admin_role);
					if(in_array('Announcement', $admin_role))
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
	
	/* Validation rules */
	protected $validation_rules = array(
		'announcementsAdd' => array(			
			array(
				'field' => 'announcements_title',
				'label' => 'title',
				'rules' => 'trim|required|is_unique[announcements.announcements_title]'
			),	
			array(
				'field' => 'announcements_description',
				'label' => 'description',
				'rules' => 'trim|required'
			),	
			array(
				'field' => 'announcements_start_date',
				'label' => 'start date',
				'rules' => 'trim|required'
			),	
			array(
				'field' => 'announcements_end_date',
				'label' => 'end date',
				'rules' => 'trim|required'
			)				
		),
		'announcementsUpdate' => array(			
			array(
				'field' => 'announcements_title',
				'label' => 'title',
				'rules' => 'trim|required'
			),	
			array(
				'field' => 'announcements_description',
				'label' => 'description',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'announcements_start_date',
				'label' => 'start date',
				'rules' => 'trim|required'
			),	
			array(
				'field' => 'announcements_end_date',
				'label' => 'end date',
				'rules' => 'trim|required'
			)
		)
	);
	
	/* Announcements list show */
	public function index()
	{		
		if($this->checkSessionAdmin())
		{
			$this->data['announcements_list'] = $this->db->order_by('id', 'desc')->get_where('announcements')->result();
			$this->show_viewAdmin('admin/announcements', $this->data);
		}
		else
		{
			$this->load->view('admin/login');
		}
    }
	
	/* announcements add and update */
	public function announcementsAdd($id = null)
	{
		if($this->checkSessionAdmin())
		{
			if($id)
			{
				if(isset($_POST['Submit']) && $_POST['Submit'] == "Update")
				{
					$this->form_validation->set_rules($this->validation_rules['announcementsUpdate']);
					if($this->form_validation->run())
					{
						$post['announcements_title'] = $this->input->post('announcements_title');		
						$post['announcements_category'] = $this->input->post('announcements_category');		
						$post['announcements_description'] = $this->input->post('announcements_description');
						$post['announcements_start_date'] = $this->input->post('announcements_start_date');
						$post['announcements_end_date'] = $this->input->post('announcements_end_date');
						$this->Comman_model->update_details('announcements', $post, 'id', $id);
						$msg = 'Announcements detail update successfully.';					
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'admin/announcements');
					}
					else
					{
						$this->data['category_list'] = $this->db->get_where('announcements_category', array('status'=>1))->result();
						$this->data['announcements_details'] = $this->Comman_model->edit_details('announcements', 'id', $id);
						$this->show_viewAdmin('admin/announcementsUpdate', $this->data);
					}
				}
				else
				{
					$this->data['category_list'] = $this->db->get_where('announcements_category', array('status'=>1))->result();
					$this->data['announcements_details'] = $this->Comman_model->edit_details('announcements', 'id', $id);
					$this->show_viewAdmin('admin/announcementsUpdate', $this->data);
				}
			}
			else
			{
				$this->data['category_list'] = $this->db->get_where('announcements_category', array('status'=>1))->result();
				if(isset($_POST['Submit']) && $_POST['Submit'] == "Submit")
				{
					$this->form_validation->set_rules($this->validation_rules['announcementsAdd']);
					if($this->form_validation->run())
					{
						$post['announcements_title'] = $this->input->post('announcements_title');		
						$post['announcements_category'] = $this->input->post('announcements_category');		
						$post['announcements_description'] = $this->input->post('announcements_description');
						$post['announcements_start_date'] = $this->input->post('announcements_start_date');
						$post['announcements_end_date'] = $this->input->post('announcements_end_date');
						$lastId = $this->Comman_model->add_details('announcements', $post);	
						if($lastId)
						{
							if('Customers Announcement' != $post['announcements_category'])
							{
								$user_list = $this->db->select('email, ')->get_where('users', array('verify_status'=>1))->result();
								if($user_list)
								{
									$subject = 'New Announcement';
									$message = '';
									$message .= '<p>New Announcement</p>';
									$message .= '<p>Check below link <a href="'.base_url().'announcements/'.str_replace(' ','_',$post['announcements_title']).'">Click Here </a></p>';
									
									foreach($user_list as $res)
									{
										$user_name = explode('@', $res->email);
										$email_type_str = explode('.',$user_name[1]);	
										$data['username'] = $user_name[0];
										$data['announcement_title'] = $post['announcements_title'];
										$data['link'] = str_replace(' ','_',$post['announcements_title']);
										//$message = $this->load->view('announcement_email_template', $data, true);
										if($email_type_str[0] == 'yahoo')
										{
											$this->send_yahoo_emailsss($res->email, $subject, $message);	
										}
										else
										{
											$mail = $this->send_mail($res->email, $subject, $message);																													
										}
									}
								}
							}
						}
						$msg = 'Announcements details inserted successfully.';					
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url('admin/announcements'));
					}
					else
					{
						$this->show_viewAdmin('admin/announcementsAdd', $this->data);
					}
				}
				else
				{
					$this->show_viewAdmin('admin/announcementsAdd', $this->data);
				}
			}
		}
		else
		{
			redirect(base_url('admin'));
		}
	}
	
	/*--------------------------------------------------------------------
 	*	Yahoo email send
 	*---------------------------------------------------------------------
	*/
	public function send_yahoo_emailsss($emailt, $subject, $message)
	{
		$this->load->library('php_mailer/Phpmailer');
		
		$this->phpmailer->AddAddress($emailt);
		$this->phpmailer->IsMail();
		$this->phpmailer->From = 'info@evoai.network';
		$this->phpmailer->FromName = 'Evoai network';
		$this->phpmailer->IsHTML(true);
		$this->phpmailer->Subject = $subject;
		$this->phpmailer->Body = $message;
		return $this->phpmailer->Send();		
	}
	
	/* Delete user */	
	public function delete_detail($id = null)
	{
		if($this->checkSessionAdmin())
		{
			$this->Comman_model->delete_detail('announcements', 'id', $id);	
			$msg = 'Announcements detail remove successfully.';					
			$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
			redirect(base_url().'admin/announcements');
		}
		else
		{
			redirect(base_url().'admin');
		}		
	}
	
	/* Set Active / Inactive Status */
	public function setStatus()
	{
		if($this->checkSessionAdmin())
		{
			$id = $this->input->post('id');
			$post['status'] = $this->input->post('status');
			$this->Comman_model->update_details('announcements', $post, 'id', $id);
			echo 1 ;
			exit();
		}
		else
		{
			redirect(base_url().'admin');
		}
	}	
	
	/* Category */
	public function category()
	{
		if($this->checkSessionAdmin())
		{
			if(isset($_POST['name']))
			{
				$this->form_validation->set_rules('name', 'category name', 'required|is_unique[announcements_category.name]');
                if ($this->form_validation->run() == TRUE)
				{
					$post['name'] = $this->input->post('name');
					$this->Comman_model->add_details('announcements_category', $post);	
                    $msg = 'Category add successfully.';					
					$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url().'admin/announcements/category');
                }
                else
                {
                    $this->data['category_result'] = $this->db->get_where('announcements_category')->result();
					$this->show_viewAdmin('admin/announcementsCategory', $this->data);
                }
			}
			else
			{
				$this->data['category_result'] = $this->db->get_where('announcements_category')->result();
				$this->show_viewAdmin('admin/announcementsCategory', $this->data);				
			}
		}
		else
		{
			redirect(base_url('admin'));
		}
	}
	
	/* Category add */
	public function announcementsEdit($id)
	{
		if($this->checkSessionAdmin())
		{
			if(isset($_POST['name']))
			{
				$this->form_validation->set_rules('name', 'category name', 'required');
                if ($this->form_validation->run() == TRUE)
				{
					$post['name'] = $this->input->post('name');
					$this->Comman_model->update_details('announcements_category', $post, 'id', $id);
                    $msg = 'Category update successfully.';					
					$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url().'admin/announcements/category');
                }
                else
                {
                    $this->data['edit_categort'] = $this->db->get_where('announcements_category', array('id'=>$id))->result();
					$this->show_viewAdmin('admin/announcementsCategoryUpdate', $this->data);
                }
			}
			else
			{
				$this->data['edit_categort'] = $this->db->get_where('announcements_category', array('id'=>$id))->result();
				$this->show_viewAdmin('admin/announcementsCategoryUpdate', $this->data);				
			}
		}
		else
		{
			redirect(base_url('admin'));
		}
	}
	
	/* Delete user */	
	public function delete_detailCategory($id = null)
	{
		if($this->checkSessionAdmin())
		{
			$this->Comman_model->delete_detail('announcements_category', 'id', $id);			
			$msg = 'Announcements category detail remove successfully.';					
			$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
			redirect(base_url().'admin/announcements/category');
		}
		else
		{
			redirect(base_url().'admin');
		}		
	}
	
	/* Set Active / Inactive Status */
	public function setStatusCategory()
	{
		if($this->checkSessionAdmin())
		{
			$id = $this->input->post('id');
			$post['status'] = $this->input->post('status');
			$this->Comman_model->update_details('announcements_category', $post, 'id', $id);
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