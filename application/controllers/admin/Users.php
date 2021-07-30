<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller 
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
			$this->data['user_list'] = $this->db->order_by('id', 'desc')->get_where('users')->result();
			$this->show_viewAdmin('admin/users', $this->data);
		}
		else
		{
			$this->load->view('admin/login');
		}
    }
	
	/* userDetails */	
	public function userDetails()	
	{		
		if($this->checkSessionAdmin())
		{
			$id = $_GET['e'];
			$user_result = $this->db->get_where('users', array('id'=>$id))->row();
			$this->data['user_result'] = $user_result;
			$this->data['refence_by'] = $this->db->get_where('users', array('user_referral_code'=>$user_result->user_referenced_code))->row();
			$this->data['referral_list'] = $this->db->get_where('users', array('user_referenced_code'=>$user_result->user_referral_code))->result();
			//$this->data['bonus_result'] = $this->db->get_where('user_bonus', array('user_id'=>$user_result->id))->result();
			$this->data['bonus_result'] = $this->db->get_where('user_coin_transaction', array('referenced_code'=>$user_result->user_referral_code, 'bonus_value >'=>0))->result();
			$this->data['bonus_resultByGroup'] = $this->Comman_model->userBonus_byGroup();
			$this->show_viewAdmin('admin/userDetails', $this->data);
		}
		else
		{	
			$this->load->view('admin/login');
		}
	}		
	
	/* Pay Now bonus */	
	public function payNow_bonus()	
	{
		if($this->checkSessionAdmin())
		{
			$user_id = $_POST['user_id'];	
			$post['user_bonus'] = $_POST['user_bonus'];
			$referal_user_id = $_POST['referal_user_id'];
			$post['referal_user_email'] = $_POST['referal_user_email'];	
			$post['transaction_id'] = $_POST['transaction_id'];	
			$post['modify_date'] = date('Y-m-d');
			$s_user_email = $_POST['s_user_email'];	
			$existing_bonus = $this->db->get_where('user_bonus', array('referal_user_id'=>$referal_user_id))->row();
			if($existing_bonus)
			{
				//$this->db->where('user_id', $user_id);
				$this->db->where('referal_user_id', $referal_user_id);
				$this->db->update('user_bonus', $post);	
			}
			else
			{		
				$post['user_id'] = $user_id;	
				$post['referal_user_id'] = $referal_user_id;	
				$this->db->insert('user_bonus', $post);	
			}	
			//$userName = explode('@',$post['referal_user_email']);
			$subject = 'Bonus is transfered your evoai network account';
			$message = '';
			$message .= '<p>Dear </p>';
			$message .= '<p>Bonus is transfered your evoai network account, by Admin</p>';
			$message .= '<p>Transection id: '.$post['transaction_id'].'</p>';
			$this->send_mail($s_user_email, $subject, $message);
			
			echo 1;		
		}
		else	
		{
			redirect(base_url().'admin');
		}
	}	
	
	/* payNow_totalBonus */
	public function payNow_totalBonus()
	{
		if($this->checkSessionAdmin())
		{
			$selecy_user_id = $_POST['selecy_user_id'];
			$transaction_id = $_POST['all_transaction_id'];
			$user_bonus_arr = explode(',',$_POST['user_bonus_arr']);				
			$user_result = $this->db->get_where('users', array('id'=>$selecy_user_id))->row();
			$referral_list = $this->db->get_where('users', array('user_referenced_code'=>$user_result->user_referral_code))->result();
			$bonus_result = $this->db->get_where('user_bonus', array('user_id'=>$user_result->id))->result();
			if($referral_list)
			{
				foreach($referral_list as $res)
				{
					$ii = '';
					$user_bonus_val = '';
					$referal_user_ids = '';
					if($user_bonus_arr)
					{
						for($ii = 0; $ii <= count($user_bonus_arr); $ii++)
						{
							$bonus_arr = explode('_', $user_bonus_arr[$ii]);							
							if($bonus_arr[1] == $res->id)
							{
								$user_bonus_val = $bonus_arr[0];
								$referal_user_ids = $bonus_arr[1];
							}
						}
					}
					else
					{
						$user_bonus_val = 0.00;	
					}
					$post['user_bonus'] = $user_bonus_val;						
					$post['transaction_id'] = $transaction_id;						
					$post['modify_date'] = date('Y-m-d');					
					$existing_bonus = $this->db->get_where('user_bonus', array('referal_user_id'=>$referal_user_ids))->row();
					if($existing_bonus)
					{
						$this->db->where('referal_user_id', $referal_user_ids);
						$this->db->update('user_bonus', $post);	
					}
					else
					{						
						$post['user_id'] = $selecy_user_id;	
						$post['referal_user_id'] = $res->id;	
						$this->db->insert('user_bonus', $post);	
					}						
				}
			}
			$subject = 'Bonus is transfered your evoai network account';
			$message = '';
			$message .= '<p>Dear </p>';
			$message .= '<p>Bonus is transfered your evoai network account, by Admin</p>';
			$message .= '<p>Transection id: '.$post['transaction_id'].'</p>';
			$this->send_mail($s_user_email, $subject, $message);
			echo 1;
		}
		else
		{
			redirect(base_url('admin'));
		}
	}
	
	/* Delete user */	
	public function delete_detail($id = null)
	{
		if($this->checkSessionAdmin())
		{
			$this->Comman_model->delete_detail('users', 'id', $id);
			
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
			$post['active'] = $this->input->post('status');
			$this->Comman_model->update_details('users', $post, 'id', $id);
			echo 1 ;
			exit();
		}
		else
		{
			redirect(base_url().'admin');
		}
	}
	
	/* disabledGoogleAuth */
	function disabledGoogleAuth()
	{
		if($this->checkSessionAdmin())
		{
			$uId = $_POST['user_id'];
			$post['otp'] = '';
			$post['sign_in'] = 0;
			$this->Comman_model->update_details('users', $post, 'id', $uId);
			echo 1;
			exit();
		}
		else						
		{
			redirect(base_url('admin'));
		}
	}
	
	/* setBetaVersion */
	public function setBetaVersion()
	{
		if($this->checkSessionAdmin())
		{
			$val = $_POST['userBetaVersion'];
			$uId = $_POST['user_id'];
			if($uId)
			{
				$post['beta_role'] = $val;
				$this->Comman_model->update_details('users', $post, 'id', $uId);
				if($val == 1)
				{
					echo 'Beta version enable successfully.';
					exit();
				}
				else
				{
					echo 'Beta version disabled successfully.';
					exit();
				}
			}
			else
			{
				echo 'Some error occurred';
			}
		}
		else
		{
			echo 'Some error occurred';
		}
	}
	
	/* setSuperVersion */
	public function setSuperVersion()
	{
		if($this->checkSessionAdmin())
		{
			$val = $_POST['userSuperVersion'];
			$uId = $_POST['user_id'];
			if($uId)
			{
				$post['super_role'] = $val;
				$this->Comman_model->update_details('users', $post, 'id', $uId);
				if($val == 1)
				{
					echo 'All access enable successfully.';
					exit();
				}
				else
				{
					echo 'All access disabled successfully.';
					exit();
				}
			}
			else
			{
				echo 'Some error occurred';
			}
		}
		else
		{
			echo 'Some error occurred';
		}
	}
}

/* End of file */