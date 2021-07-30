<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Profile extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->Ref_UserID = $this->session->userdata('Ref_UserID');
		$this->Ref_UserEmail = $this->session->userdata('Ref_UserEmail');
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Registration
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{	
			/*
			$profile_data = $this->db->get_where('users', array('id'=>$this->Ref_UserID))->row();			
			$user = $profile_data;
			if(isset($_POST))
			{
				$otp = $this->input->post('otp');					
				if(empty($otp))
				{
					$otp = 0;
					$this->ion_auth->otp_delete($this->Ref_UserID);
				}
				$secret_key = '';
				if ((bool)$otp)
				{					
					if((bool)$otp === TRUE)
					{
						// Create secret to redirect to otp_activation
						$this->form_validation->set_rules('otp', $this->lang->line('edit_user_validation_otp_label'), 'xss_clean|trim');
						if($this->ion_auth->set_otp_secret_key($this->Ref_UserID) )
						{
							$this->ion_auth->backup_codes($this->Ref_UserID);
							$secret_key = $this->ion_auth->get_otp_secret_key($this->Ref_UserID);
							#$backup_codes = $this->ion_auth->backup_codes_db($id);
						}
					}
				}	
				if(!empty($secret_key))
				{ 
					$this->session->set_flashdata('otp_secret_key', $secret_key);
					$this->session->set_flashdata('otp_message', $user->{$this->config->item('identity', 'ion_auth')});
					#$this->session->set_flashdata('otp_backup_codes', $backup_codes);
					
					$this->data['google_chart_url'] = $this->ion_auth->get_qrcode_googleurl($user->{$this->config->item('identity', 'ion_auth')}, $secret_key, $this->config->item('otp', 'ion_auth')['issuer']);
					//$this->data['backup_codes'] = unserialize($this->ion_auth->backup_codes_db($this->Ref_UserID));
				}
				else
				{
					$this->data['google_chart_url'] = '';
					//$this->data['backup_codes'] = '';
				}
			}
			*/
			$this->data['title'] = 'Profile';						
			$this->data['menuId'] = 'Profile';						
			$this->data['user_details'] = $this->db->get_where('users', array('id'=>$this->Ref_UserID))->row();					
			$this->show_viewFrontInner('profile', $this->data); 								
		}
		else
		{
			$this->session->set_flashdata('error_message', 'Please login first');	
			redirect('home');
		}						
 	}	
	
	/* 2FA update */
	public function google2FA()
	{
		if($this->checkfrantSession())
		{
			$user = $this->db->get_where('users', array('id'=>$this->Ref_UserID))->row();	
			$HTML = '';
			$otp = $_POST['otp'];				
			$identity = $this->Ref_UserEmail;			
			$secret_key = '';
			if($otp == 1)
			{					
				$this->form_validation->set_rules('otp', $this->lang->line('edit_user_validation_otp_label'), 'xss_clean|trim');
				if($this->ion_auth->set_otp_secret_key($this->Ref_UserID) )
				{
					$this->ion_auth->backup_codes($this->Ref_UserID);
					$secret_key = $this->ion_auth->get_otp_secret_key($this->Ref_UserID);
				}
			}	
			if(!empty($secret_key))
			{ 

				$activation_code = $this->ion_auth->set_otp_login_activation($this->Ref_UserEmail);									
				if($activation_code)
				{					
					$this->session->set_flashdata('otp_login_key', $activation_code);
					$this->session->set_flashdata('identity', $this->Ref_UserEmail);
					$this->session->set_flashdata('remember_me', 1);
					$this->session->set_flashdata('otp_secret_key', $secret_key);
					$this->session->set_flashdata('otp_message', $user->{$this->config->item('identity', 'ion_auth')});			
					$this->data['google_chart_url'] = $this->ion_auth->get_qrcode_googleurl($user->{$this->config->item('identity', 'ion_auth')}, $secret_key, $this->config->item('otp', 'ion_auth')['issuer']);
			
					$this->data['token'] = array('name' => 'token',
						'id' => 'token',
						'class' => 'form-control',
						'type' => 'text'
						//'placeholder' => 'Enter the scan code for verification.'
					);
					$this->data['identity'] = $this->Ref_UserEmail;
					$this->data['remember'] = 1;
					$this->data['otp_login_key'] = $activation_code;
				}
				$HTML = $this->load->view('loginOTP2FA', $this->data, true);
			}
			echo $HTML;
		}
		else		
		{
			$HTML = 'Login first';		
			echo $HTML;
		}
	}
	
	/* google2FAUpdate */
	public function google2FAUpdate()
	{
		if($this->checkfrantSession())
		{
			if ($this->ion_auth->is_otp_set($this->input->post('identity')))
			{
				if ($this->ion_auth->otp_login($this->input->post('identity'), $this->input->post('token'), FALSE, $this->input->post('otp_login_key')))
				{					
					$post['sign_in'] = 1;							
					$this->Front_model->update_dataTable('users', $post, 'id', $this->Ref_UserID);
					$msg = '2FA activate successfull';					
					$this->session->set_flashdata('success_message', $msg);
					//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url('profile'));
				}
				else
				{
					$post['sign_in'] = 0;							
					$this->Front_model->update_dataTable('users', $post, 'id', $this->Ref_UserID);
					$this->ion_auth->otp_delete($this->Ref_UserID);
					$msg = 'Code are invalid';					
					$this->session->set_flashdata('error_message', $msg);
					//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url('profile'));
				}
			}
			else
			{
				$post['sign_in'] = 0;							
				$this->Front_model->update_dataTable('users', $post, 'id', $this->Ref_UserID);
				$this->ion_auth->otp_delete($this->Ref_UserID);	
				$msg = 'Code are invalid';					
				$this->session->set_flashdata('error_message', $msg);
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url('profile'));
			}			
		}
	}
	
	/* profileFormClose */
	public function profileFormClose()
	{
		$post['sign_in'] = 0;							
		$this->Front_model->update_dataTable('users', $post, 'id', $this->Ref_UserID);
		$this->ion_auth->otp_delete($this->Ref_UserID);
		$msg = '2FA close';					
		$this->session->set_flashdata('success_message', $msg);
		//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
		redirect(base_url('profile'));
	}
	
	/* profileFormClose */
	public function google2FACloseForm()
	{
		$activation_code = $this->ion_auth->set_otp_login_activation($this->Ref_UserEmail);									
		if($activation_code)
		{					
			$this->data['token'] = array('name' => 'token',
				'id' => 'token',
				'class' => 'form-control',
				'type' => 'text'
				//'placeholder' => 'Enter the current code to deactivate.'
			);
			$this->data['identity'] = $this->Ref_UserEmail;
			$this->data['remember'] = 1;
			$this->data['otp_login_key'] = $activation_code;
		}
		$HTML = $this->load->view('loginOTP2FAClose', $this->data, true);
		echo $HTML;		
	}
	
	/* google2FAClose */
	public function google2FAClose()
	{
		$this->form_validation->set_rules('token', 'Token', 'required');		
		if ($this->form_validation->run() == true)
		{
			if ($this->ion_auth->otp_login($this->input->post('identity'), $this->input->post('token'), FALSE, $this->input->post('otp_login_key')))
			{
				$post['sign_in'] = 0;			
				$this->db->where('id', $this->Ref_UserID);
				$this->db->update('users', $post);
				$this->ion_auth->otp_delete($this->Ref_UserID);
				$msg = '2FA deactivate successfull';					
				$this->session->set_flashdata('success_message', $msg);
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url('profile'));
			}
			else
			{
				$msg = 'Code are invalid';					
				$this->session->set_flashdata('error_message', $msg);
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url('profile'));
			}			
		}
		else
		{
			$msg = 'Please enter valid code';					
			$this->session->set_flashdata('error_message', $msg);
			//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
			redirect(base_url('profile'));
		}
	}
	
	/* Profile update */
	public function updateProfile()
	{
		if($this->checkfrantSession())
		{
			$HTML = '';
			$username = $_POST['username'];			
			$eth_address = $_POST['eth_address'];
			$check_ethAddress = $this->db->get_where('users', array('eth_address'=>$eth_address, 'id !='=>$this->Ref_UserID))->num_rows();
			if($check_ethAddress > 0)
			{
				$msg = 'ETH address is already exist';
				$HTML = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div>';			
			}
			else
			{
				$address_result = json_decode(file_get_contents("https://shapeshift.io/validateAddress/".$eth_address."/eth"));
				if($address_result->isvalid != 1)
				{			
					$msg = 'ETH address are invalid';
					$HTML = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div>';			
				}
				else
				{
					if($username != '')
					{
						$post['username'] = $username;
						$post['eth_address'] = $eth_address;	
						//$this->db->where('id', $this->Ref_UserID);
						//$this->db->update('users', $post);
						$token_id = md5(uniqid(mt_rand())).$this->Ref_UserID;
						$changeETHAddressLink = base_url().'home/profileupdate?tokenindex='.$token_id;
						$subject = "Update profile";
						$message = '';
						$message = '<p>Hello '.$username.',</p>';				
						$message = '<p>Please verify the below link for updation in your profile, this link should be expired after 4 Hours';				
						$message .= '<br>visit the following link: <a href='.$changeETHAddressLink.'> click here </a></p>';
						$message .= '<h3><i>Thanks & Regards,<br>';
						$message .= 'Evoai Team</i></h3>';
						$post['username'] = $username;
						$post['changeETHAddressLink'] = $changeETHAddressLink; 
						$message_body = $this->load->view('profileUpdate_template', $post, true);	
						$this->send_mail($this->Ref_UserEmail, $subject, $message_body);
						
						/* Insert to database update profile */
						//$CreateTime = date("H:i:s");
						//$duration	= '+4 hours';
						//$ExpiryTime = date('H:i:s', strtotime($duration, strtotime($CreateTime)));
						
						$profile_data['user_id'] = $this->Ref_UserID;
						$profile_data['user_email'] = $this->Ref_UserEmail;
						$profile_data['user_name'] = $username;
						$profile_data['user_token'] = $token_id;
						$profile_data['user_eth_address'] = $eth_address;
						$profile_data['create_time'] = time();
						$profile_data['expire_time'] = strtotime('+4 hour');
						
						$this->db->insert('changeprofile', $profile_data);
						$msg = 'Please verify your change from your registered email address';					
						$HTML = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div>';
					}
					else
					{
						$msg = 'Username is required';
						$HTML = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div>';			
					}
				}							
			}
			echo $HTML;
		}	
		else		
		{
			$msg = 'Profile are not update';					
			$HTML = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div>';
			echo $HTML;
		}
	}
	
	/* changePassword */
	public function changePassword()
	{
		if($this->checkfrantSession())
		{
			$HTML = '';
			$current_password = $_POST['current_password'];
			$new_password = $_POST['new_password'];
			$pass_result = $this->db->get_where('users', array('id'=>$this->Ref_UserID, 'password'=>md5($current_password)))->num_rows();
			if($pass_result > 0)
			{
				$post['password'] = md5($new_password);
				$this->db->where('id', $this->Ref_UserID);
				$this->db->update('users', $post);
				$msg = 'Password is change successful!';
				$HTML = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div>';			
			}
			else
			{
				$msg = 'Current password are not match';					
				$HTML = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div>';
			}
			echo $HTML;
		}
		else
		{
			$msg = 'Password are not change';					
			$HTML = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div>';
			echo $HTML;
		}
	}
}
