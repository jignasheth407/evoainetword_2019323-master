<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Dashboard extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Dashboard
 	*---------------------------------------------------------------------
	*/
	function index()
	{		
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Dashboard';
			$this->data['menuId'] = 'Dashboard';	
			$this->data['user_details'] = $this->db->get_where('users', array('id'=>$this->Ref_UserID))->row();	
			//$this->show_viewFrontInner('node_login', $this->data);			
			$this->show_viewFrontInner('dashboard', $this->data);			
		}
		else
		{
			redirect('home');
		}
 	}		
	
	/* Security security */
	public function security()
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Security';	
			$this->data['menuId'] = 'Security';				
			$secret_key = '';
			$profile_data = $this->db->get_where('users', array('id'=>$this->Ref_UserID))->row();			
			$user = $profile_data;
			if($this->ion_auth->set_otp_secret_key($this->Ref_UserID) )
			{
				$this->ion_auth->backup_codes($this->Ref_UserID);
				$secret_key = $this->ion_auth->get_otp_secret_key($this->Ref_UserID);
				#$backup_codes = $this->ion_auth->backup_codes_db($id);
			}
			$this->session->set_flashdata('otp_secret_key', $secret_key);
			$this->data['otp_secret_key'] = $secret_key;			
			if($this->data['otp_secret_key'] != NULL)
			{
				$this->data['message'] = $this->session->flashdata('message');
				$this->session->set_flashdata('otp_message', $user->{$this->config->item('identity', 'ion_auth')});
				$this->data['google_chart_url'] = $this->ion_auth->get_qrcode_googleurl($this->session->flashdata('otp_message'), $this->data['otp_secret_key'], $this->config->item('otp', 'ion_auth')['issuer']);
				$this->data['backup_codes'] = unserialize($this->ion_auth->backup_codes_db($this->Ref_UserID));
				$this->data['user_details'] = $profile_data;	
				$this->show_viewFrontInner('security', $this->data);
			}
			else
			{
				redirect('dashboard');
			}
		}
		else
		{
			redirect('login');
		}
	}
	
	/* User profile */
	public function profile()
	{
		if($this->checkfrantSession())
		{	
			$profile_data = $this->db->get_where('users', array('id'=>$this->Ref_UserID))->row();			
			$user = $profile_data;
			if(isset($_POST))
			{
				//$otp = $this->input->post('otp');					
				$otp = 1;					
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
				if($profile_data->sign_in == 0)
				{
					$msg = 'Profile is not update, please change profile update status';
					$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url('dashboard'));
				}
				else
				{					
					$data['sign_in'] = $otp;			
					$this->db->where('id', $this->Ref_UserID);
					$this->db->update('users', $data);
						
					if(!empty($secret_key))
					{ 
						$this->session->set_flashdata('otp_secret_key', $secret_key);
						$this->session->set_flashdata('otp_message', $user->{$this->config->item('identity', 'ion_auth')});
						$this->data['google_chart_url'] = $this->ion_auth->get_qrcode_googleurl($this->session->flashdata('otp_message'), $this->data['otp_secret_key'], $this->config->item('otp', 'ion_auth')['issuer']);
						$this->data['backup_codes'] = unserialize($this->ion_auth->backup_codes_db($id));
						#$this->session->set_flashdata('otp_backup_codes', $backup_codes);
						redirect('dashboard/otp_activation/'.$this->Ref_UserID); 
					}
				}
			}
			$this->data['title'] = 'Profile';
			$this->data['menuId'] = 'Profile';				
			$this->data['user_details'] = $this->db->get_where('users', array('id'=>$this->Ref_UserID))->row();				
			$this->show_viewFrontInner('profile', $this->data); 								
		}
		else
		{
			redirect('home');
		}
	}
	
	// Display OTP secret key and QR-code
	public function otp_activation($id)
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Profile';	
			$this->data['menuId'] = 'Profile';	
			$this->data['otp_secret_key'] = $this->session->flashdata('otp_secret_key');
			if($this->data['otp_secret_key'] != NULL)
			{
				$this->data['message'] = $this->session->flashdata('message');
				$this->data['google_chart_url'] = $this->ion_auth->get_qrcode_googleurl($this->session->flashdata('otp_message'), $this->data['otp_secret_key'], $this->config->item('otp', 'ion_auth')['issuer']);
				$this->data['backup_codes'] = unserialize($this->ion_auth->backup_codes_db($id));
				$this->data['user_details'] = $this->db->get_where('users', array('id'=>$this->Ref_UserID))->row();;	
				$this->show_viewFrontInner('otp_activation', $this->data);
			}
			else
			{
				redirect('dashboard/profile', 'refresh');
			}
			
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}
	
	/* get live rate btc to usd */
	function getBTCtoUSDrate() 
	{
		$rateCurrency = file_get_contents("https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC&tsyms=USD");		
		echo $rateCurrency;
	}
}
