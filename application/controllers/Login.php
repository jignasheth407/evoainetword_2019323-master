<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Login extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->Ref_UserID = $this->session->userdata('Ref_UserID');
		$this->load->helper(array('url','language'));
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Login
 	*---------------------------------------------------------------------
	*/
	public function index()
	{
		if(isset($_POST['Login']))
		{
			$postData = $this->input->post();			
			$google_captcha = $this->input->post('g-recaptcha-response');
			$rec_val = $this->google_validate_captcha($google_captcha);
			if(empty($rec_val))
			{
				$msg = 'reCaptcha are invalid';
				$this->session->set_flashdata('error_message', $msg);
				//$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div>');
				redirect(base_url('home'));
			}
			$data['email'] = $postData['email'];
			$data['password'] 	= $postData['password'];
			$remember = (bool) $this->input->post('remember');
			$UserEmail = $this->db->get_where('users', array('email' => $data['email'], 'active'=>1))->row();			
			if ($UserEmail->email != '') 
			{
				$userDetails = $this->db->get_where('users', array('email' => $data['email'], 'password' => md5($data['password'])))->row();
				if ($userDetails->email != '') 
				{
					if($userDetails->sign_in == 1)
					{
						if ( $this->ion_auth->is_otp_set( $this->input->post('email') ) )
						{						
							$activation_code = $this->ion_auth->set_otp_login_activation($this->input->post('email'));							
							if($activation_code)
							{
								$this->session->set_flashdata('otp_login_key', $activation_code);
								$this->session->set_flashdata('identity', $this->input->post('email'));
								$this->session->set_flashdata('remember_me', $remember);
								redirect(base_url('login/login_otp1')); //use redirects instead of loading views for compatibility with MY_Controller libraries
							}
							//if the set activation was un-successful
							//redirect them back to the login page
							//$this->session->set_flashdata('message', $this->ion_auth->errors());
							$this->session->set_flashdata('error_message', $this->ion_auth->errors());
							redirect(base_url('login')); //use redirects instead of loading views for compatibility with MY_Controller libraries
						}						
					}
					$msg = 'Login successfully!';
					//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					$this->session->set_flashdata('success_message', $msg);
					$this->session->set_userdata('Ref_UserID', $userDetails->id);
					$this->session->set_userdata('Ref_UserName', $userDetails->username);
					$this->session->set_userdata('Ref_logged_in', TRUE);
					$this->session->set_userdata('Ref_UserEmail', $userDetails->email);
					$this->session->set_userdata('Ref_ethAddress', $userDetails->eth_address);
					$this->session->set_userdata('Ref_beta_role', $userDetails->beta_role);
					$this->session->set_userdata('Ref_super_role', $userDetails->super_role);
					$loginData['IP_address'] = $this->input->ip_address();
					$loginData['user_email'] = $userDetails->email;
					$loginData['date_time'] = time();
					$this->db->insert('login_user', $loginData);
					redirect('dashboard');
					//redirect('http://localhost:7000/dashboard?a='.$userDetails->id);
				}
				else
				{
					$msg = 'Invalid email or password!';
					$this->session->set_flashdata('error_message', $msg);
					//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url('login'));
				}
			}
			else
			{
				$msg = 'Invalid email address or account is not active';
				$this->session->set_flashdata('error_message', $msg);
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url('login'));
			}
		}
		else
		{
			if($this->checkfrantSession())
			{
				redirect('dashboard');
			}
			else
			{
				$this->data['title'] = 'Login';
				$this->show_viewFrontInner('login', $this->data);				
			}
		}			
	}
	
	
	//login with two-step authentication
	function login_otp()
	{		
		$this->data['title'] = "Login";
		
		//validate form input
		$this->form_validation->set_rules('token'			, 'Token', 'required');
		
		if ($this->form_validation->run() == true)
		{
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->is_otp_set($this->input->post('identity')))
			{
				if ($this->ion_auth->otp_login($this->input->post('identity'), $this->input->post('token'), $remember, $this->input->post('otp_login_key')))
				{
					$session = $this->session->all_userdata();
					$isActive = $this->db->get_where('users', array('id' => $session['id']))->row();
					
					$this->session->set_userdata('Ref_is_logged', 'yes');
					$this->session->set_userdata('Ref_UserID', $isActive->id);
					$this->session->set_userdata('Ref_UserName', $isActive->username);
					$this->session->set_userdata('Ref_logged_in', TRUE);
					$this->session->set_userdata('Ref_UserEmail', $isActive->email);	
					$this->session->set_userdata('Ref_ethAddress', $isActive->eth_address);
					$this->session->set_userdata('Ref_beta_role', $isActive->beta_role);
					$this->session->set_userdata('Ref_super_role', $isActive->super_role);
					$loginData['IP_address'] = $this->input->ip_address();
					$loginData['user_email'] = $isActive->email;
					$loginData['date_time'] = time();
					$this->db->insert('login_user', $loginData);
					$msg = 'Login successfully!';	
					$this->session->set_flashdata('success_message', $msg);					
					//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url('dashboard'));
					//redirect('http://localhost:7000/dashboard?a='.$userDetails->id);
				}
				else
				{
					//if the login was un-successful
					//redirect them back to the login page
					//$this->session->set_flashdata('message', $this->ion_auth->errors());
					$this->session->set_flashdata('error_message', $this->ion_auth->errors());
					redirect(base_url('login')); //use redirects instead of loading views for compatibility with MY_Controller libraries
				}
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				//$this->session->set_flashdata('message', $this->ion_auth->errors());
				$this->session->set_flashdata('error_message', $this->ion_auth->errors());
				redirect('login'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{			
			if($this->session->flashdata('identity') == NULL || $this->session->flashdata('otp_login_key') == NULL)
			{
				$this->session->set_flashdata('error_message', 'Invalid identity');
				redirect('login');
			}
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message_login'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['token'] = array(
				'name' => 'token',
				'id' => 'token',
				'class' => 'form-control',
				'type' => 'text'
			);
			$this->data['identity'] = $this->session->flashdata('identity');
			$this->data['remember'] = $this->session->flashdata('remember_me');
			$this->data['otp_login_key'] = $this->session->flashdata('otp_login_key');
			
			$this->show_viewFrontInner('login_otp', $this->data);
		}
	}
	
	//login with two-step authentication
	function login_otp1()
	{		
		$this->data['title'] = "Login";
		
		//validate form input
		$this->form_validation->set_rules('token', 'Token', 'required');		
		if ($this->form_validation->run() == true)
		{ 
			/*
			$google_captcha = $this->input->post('g-recaptcha-response');
			$rec_val = $this->google_validate_captcha($google_captcha);
			if(empty($rec_val))
			{
				$msg = 'reCaptcha are invalid';
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url('login/login_otp1'));
			}
			*/
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->is_otp_set($this->input->post('identity')))
			{				
				if ($this->ion_auth->otp_login($this->input->post('identity'), $this->input->post('token'), $remember, $this->input->post('otp_login_key')))
				{
					$session = $this->session->all_userdata();					
					$isActive = $this->db->get_where('users', array('email' => $session['identity']))->row();
					
					$this->session->set_userdata('Ref_is_logged', 'yes');
					$this->session->set_userdata('Ref_UserID', $isActive->id);
					$this->session->set_userdata('Ref_UserName', $isActive->username);
					$this->session->set_userdata('Ref_logged_in', TRUE);
					$this->session->set_userdata('Ref_UserEmail', $isActive->email);										
					$this->session->set_userdata('Ref_ethAddress', $isActive->eth_address);
					$this->session->set_userdata('Ref_beta_role', $isActive->beta_role);
					$this->session->set_userdata('Ref_super_role', $isActive->super_role);
					$loginData['IP_address'] = $this->input->ip_address();
					$loginData['user_email'] = $isActive->email;
					$loginData['date_time'] = time();
					$this->db->insert('login_user', $loginData);
					$msg = 'Login successfully!';	
					$this->session->set_flashdata('success_message', $msg);
					//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url('dashboard'));
					//redirect('http://localhost:7000/dashboard?a='.$userDetails->id);
				}
				else
				{
					/*
					$this->session->set_flashdata('error_message', $this->ion_auth->errors());
					redirect(base_url('login')); //use redirects instead of loading views for compatibility with MY_Controller libraries
					
					if($this->session->flashdata('identity') == NULL || $this->session->flashdata('otp_login_key') == NULL)
					{
						$this->session->set_flashdata('error_message', 'Invalid identity');
						redirect('login');
					}
					*/
					//the user is not logging in so display the login page
					//set the flash data error message if there is one
					$this->data['message_login'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

					$this->data['token'] = array('name' => 'token',
						'id' => 'token',
						'class' => 'form-control',
						'type' => 'text'
					);
					$this->data['identity'] = $this->session->flashdata('identity');
					$this->data['remember'] = $this->session->flashdata('remember_me');
					$this->data['otp_login_key'] = $this->session->flashdata('otp_login_key');
					
					$this->show_viewFrontInner('login_otp', $this->data);
				}
			}
			else
			{
				/*
				$this->session->set_flashdata('error_message', 'Error ..'.$this->ion_auth->errors());
				redirect('login'); //use redirects instead of loading views for compatibility with MY_Controller libraries
				*/
				if($this->session->flashdata('identity') == NULL || $this->session->flashdata('otp_login_key') == NULL)
				{
					$this->session->set_flashdata('error_message', 'Invalid identity');
					redirect('login');
				}
				//the user is not logging in so display the login page
				//set the flash data error message if there is one
				$this->data['message_login'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['token'] = array('name' => 'token',
					'id' => 'token',
					'class' => 'form-control',
					'type' => 'text'
				);
				$this->data['identity'] = $this->session->flashdata('identity');
				$this->data['remember'] = $this->session->flashdata('remember_me');
				$this->data['otp_login_key'] = $this->session->flashdata('otp_login_key');
				
				$this->show_viewFrontInner('login_otp', $this->data);
			}
		}
		else
		{			
			if($this->session->flashdata('identity') == NULL || $this->session->flashdata('otp_login_key') == NULL)
			{
				$this->session->set_flashdata('error_message', 'Invalid identity');
				redirect('login');
			}
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message_login'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['token'] = array('name' => 'token',
				'id' => 'token',
				'class' => 'form-control',
				'type' => 'text'
			);
			$this->data['identity'] = $this->session->flashdata('identity');
			$this->data['remember'] = $this->session->flashdata('remember_me');
			$this->data['otp_login_key'] = $this->session->flashdata('otp_login_key');
			
			$this->show_viewFrontInner('login_otp', $this->data);
		}
	}
	
	/* Goole validate captcha */
	function google_validate_captcha($google_captcha) 
	{
		$google_response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".reCaptcha_secret."&response=" . $google_captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']));
		
		if ($google_response->success) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}