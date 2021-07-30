<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminaccessrole extends MY_Controller 
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
		}		
	}
	
	/* User list show */
	public function index()
	{		
		if($this->checkSessionAdmin())
		{
			$this->data['admin_list'] = $this->db->order_by('admin_id', 'desc')->get_where('admin')->result();
			$this->show_viewAdmin('admin/adminaccessrole', $this->data);
		}
		else
		{
			$this->load->view('admin/login');
		}
    }	
	
	/* Admin access role add & update */
	public function adminrole($admin_id = null)
	{ 
		if($this->checkSessionAdmin())
		{
			if($admin_id)
			{ 
				if(isset($_POST['update']) && $_POST['update'] == 'Update')
				{
					$dataPost['admin_role'] = serialize($this->input->post('admin_role'));
					$dataPost['admin_modify_date'] = date('Y-m-d');
					$this->db->where('admin_id', $admin_id);
					$this->db->update('admin', $dataPost);
					
					$msg = 'Admin access role details update successfully!';
					$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url().'admin/adminaccessrole'); 					
				}
				else
				{ 
					$this->data['admin_details'] = $this->db->get_where('admin', array('admin_id'=>$admin_id))->row();
					$this->show_viewAdmin('admin/adminaccessroleUpdate', $this->data);
				}
			}
			else
			{
				if(isset($_POST['submit']) && $_POST['submit'] == 'Submit')
				{
					$this->form_validation->set_rules('admin_name', 'admin name', 'required');
					$this->form_validation->set_rules('admin_password', 'password', 'required');
					$this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[admin_password]');
					$this->form_validation->set_rules('admin_email', 'admin email', 'trim|required|is_unique[admin.admin_email]|valid_email');
					$dataPost['admin_name'] = $this->input->post('admin_name');
					$admin_email = $this->input->post('admin_email');
					$dataPost['admin_email'] = $admin_email;
					$user_name = explode('@', $admin_email);
					$dataPost['admin_username'] = $user_name[0];
					$dataPost['admin_password'] = md5($this->input->post('admin_password'));
					$dataPost['admin_role'] = serialize($this->input->post('admin_role'));
					$dataPost['admin_created_date'] = date('Y-m-d');
					$dataPost['admin_modify_date'] = date('Y-m-d');
					if ($this->form_validation->run() == FALSE)
					{					
						$this->show_viewAdmin('admin/adminaccessroleAdd');                    
					}
					else
					{
						$this->db->insert('admin', $dataPost);
						$last_id = $this->db->insert_id();
						if($last_id)
						{
							$subject = 'Admin account created successfully';
							$message = '';						
							$message .= '<p>Hello, '.$dataPost['admin_name'].',</p>';							
							$message .= '<p>Username: '.$dataPost['admin_email'].'</p>';							
							$message .= '<p>Password: '.$this->input->post('admin_password').'</p>';
							$post['username'] = $dataPost['admin_name'];
							$post['userEmail'] = $dataPost['admin_email'];
							$post['userPassword'] = $dataPost['admin_password'];
							$message_body = $this->load->view('adminAccessrole_template', $post, true);								
							$email_type_str = explode('.',$user_name[1]);			
							if($email_type_str[0] == 'yahoo')
							{
								$this->send_yahoo_emailss($dataPost['admin_email'], $subject, $message_body);	
							}
							else
							{
							}					
							$this->send_mail($dataPost['admin_email'], $subject, $message_body);								
						}
						$msg = 'Admin access role details stored successfully';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url('admin/adminaccessrole')); 
					}									
				}
				else
				{
					$this->show_viewAdmin('admin/adminaccessroleAdd');
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
	public function send_yahoo_emailss($emailt, $subject, $message)
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
		/*
		$config = array(	
			'protocol' => 'SMTP',
			'smtp_host' => 'mail.evoai.network',
			'smtp_port' => 587,
			'smtp_user' => 'support@evoai.network',
			'smtp_pass' => 'canuhodl2019',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE,
			'charset'  => 'utf-8',
			'priority' => '1',
		);
		$this->load->library('email', $config);
		$this->email->from('info@evoai.network', "Evoai network");
		$this->email->to($emailt);
		$this->email->subject($subject);
		$this->email->message($message);
		return $this->email->send();
		*/
	}
	
	/* Delete user */	
	public function delete_detail($admin_id = null)
	{
		if($this->checkSessionAdmin())
		{
			if($admin_id != 1)
			{
				$this->Comman_model->delete_detail('admin', 'admin_id', $admin_id);				
				$msg = 'Admin detail remove successfully.';					
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
			}
			redirect(base_url().'admin/adminaccessrole');
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
			$admin_id = $this->input->post('admin_id');
			$post['active'] = $this->input->post('status');
			$this->Comman_model->update_details('admin', $post, 'admin_id', $admin_id);
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