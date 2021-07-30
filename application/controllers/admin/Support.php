<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support extends MY_Controller 
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
						if(in_array('Support', $admin_role))
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
			$this->data['support_list'] = $this->Comman_model->supportDetails();
			$this->show_viewAdmin('admin/support', $this->data);
		}
		else
		{
			$this->load->view('admin/login');
		}
    }
	
	/* supportChat */
	public function supportChat()
	{
		if($this->checkSessionAdmin())
		{
			$ticket = $_GET['e'];
			$this->data['supportChat_list'] = $this->db->get_where('support_chat', array('ticket'=>$ticket))->result();
			$this->show_viewAdmin('admin/supportChat', $this->data);
		}
		else
		{
			$this->load->view('admin/login');
		}
	}
	
	/* Support chat */
	public function supportChat_live()
	{
		if($this->checkSessionAdmin())
		{ 
			$id = $_GET['ticket'];
			$supportChat_list = $this->db->get_where('support_chat', array('ticket'=>$id))->result();	
			$HTML = '';
			if($supportChat_list)
			{
				$this->data['supportChat_list'] = $supportChat_list;
				$HTML = $this->load->view('supportChat_live', $this->data);
			}
			echo $HTML;
		}
		else
		{
			redirect('login');
		}
	}
	
	/* supportReply */
	public function supportReply()
	{
		if($this->checkSessionAdmin())
		{
			$data['message'] = $_POST['message'];
			$data['ticket'] = $_POST['ticket'];
			$data['from_id'] = $_POST['to_id'];
			$data['to_id'] = 0;
			$data['created_date'] = date('d-m-Y');
			$this->db->insert('support_chat', $data);
			
			$supportChat_list = $this->db->get_where('support_chat', array('ticket'=>$data['ticket']))->result();	
			$HTML = '';
			if($supportChat_list)
			{
				$this->data['supportChat_list'] = $supportChat_list;
				$HTML = $this->load->view('supportChat_live', $this->data);
			}
			echo $HTML;
		}
		else
		{
			redirect(base_url().'admin');
		}
	}
	
	/* ticketClose */
	public function ticketClose()
	{
		if($this->checkSessionAdmin())
		{
			$id = $this->input->post('id');
			$post['status'] = 1;
			$this->Comman_model->update_details('support', $post, 'id', $id);
			$this->Comman_model->update_details('support_chat', $post, 'ticket', $id);
			redirect(base_url('admin/support/supportChat?e='.$id));
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
			$this->Comman_model->delete_detail('support', 'id', $id);
			
			$msg = 'User detail remove successfully.';					
			$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
			redirect(base_url().'admin/support');
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
			$this->Comman_model->update_details('support', $post, 'id', $id);
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