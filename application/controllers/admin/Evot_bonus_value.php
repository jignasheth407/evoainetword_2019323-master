<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evot_bonus_value extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->checkSessionAdmin())
		{
			if($this->admin_id != 1 && $this->admin_id != 2)
			{
				redirect(base_url().'admin/dashboard/notPermitted');
			}			
		}
	}
	
	/* User list show */
	public function index()
	{		
		if($this->checkSessionAdmin())
		{
			if(isset($_POST['Update']))
			{
				if($_POST['bonus'] != '' && $_POST['evot_value'] != '')
				{
					$post['bonus'] = $this->input->post('bonus');
					$post['evot_value'] = $this->input->post('evot_value');
					$post['modify_date'] = date('d-m-Y');
					$this->db->where('id', 1);
					$this->db->update('value_and_bonus', $post);
				}
				
				$msg = 'Update successfully';
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/dashboard'); 
			}
			else
			{
				$this->data['valueBonus_details'] = $this->db->get_where('value_and_bonus', array('id'=>1))->row();
				$this->show_viewAdmin('admin/evot_bonus_value', $this->data);				
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
    }	
	
	/* Evot value */
	public function bonus()
	{
		if($this->checkSessionAdmin())
		{
			if(isset($_POST['Update'])){
				if($_POST['bonus'] != '')
				{
					$post['bonus'] = $this->input->post('bonus');
					$this->db->where('id', 1);
					$this->db->update('value_and_bonus', $post);
				}
			}
			$this->data['bonus_details'] = $this->db->select('bonus')->get_where('value_and_bonus', array('id'=>1))->row();
			$this->show_viewAdmin('admin/bonus', $this->data);
		}
	}
	
	/* Delete user */
	public function delete_detail($id = null)
	{
		if($this->checkSessionAdmin())
		{
			$this->comman_model->delete_detail('user_inquiry', 'id', $id);
			
			$msg = 'User detail remove successfully.';					
			$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
			redirect(base_url().'admin/users');
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
			$this->comman_model->update_details('user_inquiry', $post, 'id', $id);
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