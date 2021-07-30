<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Home extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->Ref_UserID = $this->session->userdata('Ref_UserID');
		$this->load->helper(array('url','language'));
    }
	
	/*--------------------------------------------------------------------
 	*	@Function: Home
 	*---------------------------------------------------------------------
	*/	
	public function index()
	{
		if(isset($_POST['Submit']) && $_POST['Submit'] == 'Submit'){			
			$this->form_validation->set_rules('user_email', 'email', 'trim|required|valid_email');
			if($this->form_validation->run() == TRUE){
				$this->data['success_msg'] = 'Request send successfully!';	
				$data['order_type'] = $this->input->post('order_type');
				$data['currency_from_to'] = $this->input->post('currency_from_to');
				$data['price'] = $this->input->post('price');
				$data['api_name'] = $this->input->post('api_name');
				$data['order_book_price'] = $this->input->post('order_book_price');
				$data['mix_order_book_price'] = $this->input->post('mix_order_book_price');
				$data['calculate_price'] = $this->input->post('calculate_price');
				$user_email = $this->input->post('user_email');
				$data['user_email'] = $user_email;
				$this->db->insert('user_inquiry', $data);
				$last_id = $this->db->insert_id();
				if($last_id){
					$u_subject = 'Mix Order Book Submission';
					$message = '';
					$message = '<h3>Hello '.$user_email.',</h3>';
					$message .= '<p>Thanks for contacting us. We will contact you soon, please look at below your submitted form details:</p>';
					$message .= '<p>Amount: '.$data['price'].'</p>';
					$message .= '<p>Compare API to : '.$data['api_name'].'</p>';
					$message .= '<p>Order book price: '.$data['order_book_price'].'</p>';
					$message .= '<p>Mix order book price: '.$data['mix_order_book_price'].'</p>';
					$message .= '<p>Calculate price: '.$data['calculate_price'].'</p>';
					$message .= '<h3>Thanks & Regards,</h3>';
					$message .= '<h3>Evoai Team</h3>';
					$this->send_mail($user_email, $u_subject, $message);
					$a_subject = 'New Mix Order Form Submitted';
					$a_message = '';
					$a_message .= '<p>Hello Admin,</p>';
					$a_message .= '<p>New Mix Order Form Submitted as per below details:</p>';
					$a_message .= '<p>Amount: '.$data['price'].'</p>';
					$a_message .= '<p>Compare API to : '.$data['api_name'].'</p>';
					$a_message .= '<p>Order book price: '.$data['order_book_price'].'</p>';
					$a_message .= '<p>Mix order book price: '.$data['mix_order_book_price'].'</p>';
					$a_message .= '<p>Calculate price: '.$data['calculate_price'].'</p>';
					$a_message .= '<p>User email: '.$user_email.'</p>';
					$this->send_mail(ADMIN_EMAIL, $a_subject, $a_message);
				}
			}
		}
		$this->data['title'] = 'Home';
		$this->data['video_list'] = $this->db->get_where('premium_video', array('status'=>1))->result();
		
		$coinTransaction_result = $this->db->order_by('id', 'desc')->get_where('user_coin_transaction')->row();
		
		$this->show_viewFrontInner('home', $this->data);
	}
	
	/*--------------------------------------------------------------------
 	*	@Function: registration
 	*---------------------------------------------------------------------
	*/
	public function registration()
	{ 
		if(isset($_POST['Submit']))
		{ 
			$google_captcha = $this->input->post('g-recaptcha-response');
			$rec_val = $this->google_validate_captcha($google_captcha);
			if(empty($rec_val))
			{
				$msg = 'reCaptcha are invalid';
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				$this->session->set_flashdata('error_message', $msg);
				redirect(base_url('registration'));
			}
			$eth_address = $this->input->post('eth_address');
			$address_result = json_decode(file_get_contents("https://shapeshift.io/validateAddress/".$eth_address."/eth"));
			if($address_result->isvalid != 1)
			{			
				$msg = 'ETH address are invalid';
				$this->session->set_flashdata('error_message', $msg);
				redirect(base_url('registration'));
			}
			else
			{
				$user_eth_details = $this->db->get_where('users', array('eth_address'=>$eth_address))->num_rows();
				if($user_eth_details > 0)
				{
					$msg = 'MetaMask address is already used';
					$this->session->set_flashdata('error_message', $msg);
					redirect(base_url('registration'));
				}
			}
			if($eth_address == '')
			{
				$msg = 'ETH address is mandatory';
				$this->session->set_flashdata('error_message', $msg);
				redirect(base_url('registration'));
			}
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('eth_address', 'ETH address', 'trim|required|is_unique[users.eth_address]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == FALSE)
			{ 
				$msg = 'Please fill all field with given format';
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				$this->session->set_flashdata('error_message', $msg);
				redirect(base_url('registration'));
			}
			else
			{
				if($this->input->post('referenced_code') != '')
				{
					$referencedCode = $this->input->post('referenced_code');
					$validReferencedCode = $this->db->get_where('users', array('user_referral_code'=> $referencedCode))->num_rows();
					if($validReferencedCode == 0)
					{
						$msg = 'Reference code is invalid';
						$this->session->set_flashdata('error_message', $msg);
						redirect(base_url('registration'));						
					}
				}
				$post['username'] = $this->input->post('username');
				$post['eth_address'] = $this->input->post('eth_address');
				$post['email'] = $this->input->post('email');
				$post['user_referenced_code'] = $this->input->post('referenced_code');
				$post['user_referral_code'] = sha1($post['username'].''.$post['email'].''.time());
				$post['password'] = md5($this->input->post('password'));
				$lastId = $this->Front_model->insert_dataTable('users', $post);
				if($lastId)
				{
					$u_subject = 'Please verify your email';
					$message = $this->load->view('verify_email_template', $post, true);				
					//$message_body = strip_tags($message);
					$email_type = explode('@',$post['email']);
					$email_type_str = explode('.',$email_type[1]);					
					if($email_type_str[0] == 'yahoo')
					{
						$this->send_yahoo_emails($post['email'], $u_subject, $message);							
					}
					else
					{
						$this->send_mail($post['email'], $u_subject, $message);
					}
					$msg = 'Please Verify Your mail';
					//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');					
					$this->session->set_flashdata('success_message', $msg);
					redirect(base_url('home'));						
				}
			}			
		}
		else
		{
			$this->data['title'] = 'Registration';
			$this->show_viewFrontInner('registration', $this->data);			
		}
 	}
	
	/*--------------------------------------------------------------------
 	*	Yahoo email send
 	*---------------------------------------------------------------------
	*/
	public function send_yahoo_emails($emailt, $subject, $message)
	{
		$this->load->library('email');
		$this->email->from('info@evoai.network', "Evoai network");
		$this->email->to($emailt);
		$this->email->subject($subject);
		$this->email->message($message);
		return $this->email->send();
	}
	
	
	/*--------------------------------------------------------------------
 	*	@Function: verify
 	*---------------------------------------------------------------------
	*/
	function verify()
	{	    
	   $token = $_GET['t'];
	   $result =  $this->db->get_where('users',array('user_referral_code'=>$token, 'verify_status'=>0))->row();
		if($result->id != '')
		{
			$data1['verify_status'] = 1;
			$data1['active'] = 1;
			$this->db->where('user_referral_code', $token);
			$this->db->update('users', $data1);
			$msg = 'Registration successfully';
			//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
			$this->session->set_flashdata('success_message', $msg);
			redirect(base_url('home'));		   
		}
		else
		{
			$msg = 'Found some error, please contact to admin';
			//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
			$this->session->set_flashdata('error_message', $msg);
			redirect(base_url('home'));
		}
	     	
	}
	
	/* checkEmail */
	public function checkEmail()
	{
		$email = $_POST['email'];
		$HTML = '';
		$result = $this->db->get_where('users', array('email'=>$email))->num_rows();
		if($result)
		{
			$HTML = $result;
		}
		echo $HTML;
	}
	
	/* check_referencedCode */
	public function check_referencedCode()
	{
		$referenced_code = $_POST['referenced_code'];
		$HTML = '';
		$result = $this->db->get_where('users', array('user_referral_code'=>$referenced_code))->num_rows();
		if($result)
		{
			$HTML = $result;
		}
		echo $HTML;
	}
	
	/* ETH Address validation */
	public function ethAddress_validation()
	{
		$eth_address = $_POST['eth_address'];
		$HTML = '';
		$address_result = json_decode(file_get_contents("https://shapeshift.io/validateAddress/".$eth_address."/eth"));
		if($address_result->isvalid == 1)
		{
			$result_add = $this->db->select('eth_address')->get_where('users', array('eth_address'=>$eth_address))->result();
			if(count($result_add) > 0)
			{
				$HTML = 2;
			}
			else
			{
				$HTML = $address_result->isvalid;
			}
		}
		echo $HTML;
	}
	
	public function login()
	{
		if(isset($_POST['Login']))
		{
			$postData = $this->input->post();			
			$google_captcha = $this->input->post('g-recaptcha-response');
			$rec_val = $this->google_validate_captcha($google_captcha);
			if(empty($rec_val))
			{
				$msg = 'reCaptcha are invalid';
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				$this->session->set_flashdata('error_message', $msg);
				redirect(base_url('home'));
			}
			$data['email'] = $postData['email'];
			$data['password'] 	= $postData['password'];
	 		$UserEmail = $this->db->get_where('users', array('email' => $data['email']))->row();			
			if ($UserEmail->email != '') 
			{
				$userDetails = $this->db->get_where('users', array('email' => $data['email'], 'password' => md5($data['password'])))->row();
				if($userDetails != '')
				{
					if ( $this->ion_auth->is_otp_set( $this->input->post('email') ) )
					{						
						$activation_code = $this->ion_auth->set_otp_login_activation($this->input->post('email'));	
						//echo '<pre> test'; print_r($activation_code); die;
						if($activation_code)
						{
							$remember = 1;
							$this->session->set_flashdata('otp_login_key', $activation_code);
							$this->session->set_flashdata('identity', $this->input->post('email'));
							$this->session->set_flashdata('remember_me', $remember);
							redirect('home/login_otp', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
						}
						//if the set activation was un-successful
						//redirect them back to the login page
						$this->session->set_flashdata('error_message', $this->ion_auth->errors());
						redirect('login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
					}
										
					$msg = 'Login successfully!';
					//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					$this->session->set_flashdata('success_message', $msg);
					$this->session->set_userdata('Ref_UserID', $userDetails->id);
					$this->session->set_userdata('Ref_UserName', $userDetails->username);
					$this->session->set_userdata('Ref_logged_in', TRUE);
					$this->session->set_userdata('Ref_UserEmail', $userDetails->email);
					redirect(base_url('home'));
				}
				else
				{
					$msg = 'Invalid email or password!';
					//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					$this->session->set_flashdata('error_message', $msg);
					redirect(base_url('login'));
				}
			}
			else
			{
				$msg = 'Invalid email address';
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				$this->session->set_flashdata('error_message', $msg);
				redirect(base_url('login'));
			}
		}
		else
		{
			$this->data['title'] = 'Login';
			$this->show_viewFrontInner('login', $this->data);			
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
			$remember = 1;

			if ($this->ion_auth->is_otp_set($this->input->post('identity')))
			{
				if ($this->ion_auth->otp_login($this->input->post('identity'), $this->input->post('token'), $remember, $this->input->post('otp_login_key')))
				{
					$session = $this->session->all_userdata();
					$isActive = $this->db->get_where('users', array('id' => $session['id']))->row();
					
					$this->session->set_userdata('Ref_is_logged', 'yes');
					$this->session->set_userdata('Ref_UserID', $userDetails->id);
					$this->session->set_userdata('Ref_UserName', $userDetails->username);
					$this->session->set_userdata('Ref_logged_in', TRUE);
					$this->session->set_userdata('Ref_UserEmail', $userDetails->email);										
					
					$msg = 'Logged in';					
					//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					$this->session->set_flashdata('success_message', $msg);
					redirect(base_url('dashboard'));
				}
				else
				{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('error_message', $this->ion_auth->errors());
				redirect('home', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
				}
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message_login', $this->ion_auth->errors());
				$this->session->set_flashdata('error_message', $this->ion_auth->errors());
				redirect('home', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{			
			if($this->session->flashdata('identity') == NULL || $this->session->flashdata('otp_login_key') == NULL)
			{
				$this->session->set_flashdata('error_message', 'Invalid identity');
				redirect('home', 'refresh');
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
	
	// Display OTP secret key and QR-code
	public function otp_activation($id)
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Profile';		
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
			redirect('/', 'refresh');
		}
	}
	
	/* Forgot password */
	public function forgotPassword()
	{
		if(isset($_POST['ForgotPassword']))
		{
			$google_captcha = $this->input->post('g-recaptcha-response');
			$rec_val = $this->google_validate_captcha($google_captcha);
			if(empty($rec_val))
			{
				$msg = 'reCaptcha are invalid';
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				$this->session->set_flashdata('error_message', $msg);
				redirect(base_url('home/forgotPassword'));
			}
			$email = $this->input->post('email');
			$check_email = $this->db->get_where('users', array('email' => $email))->row();
			if($check_email)
			{
				$token_id = md5(uniqid(mt_rand())).$check_email->id;
				$resetPassLink = base_url().'home/resetpassword?tokenidxs='.$token_id;
				$subject = "Forgot Password";
				$message = '';
				$message = '<p>Hello '.$check_email->username.',</p>';				
				$message = '<p>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen. To reset your password!';				
				$message .= '<br>visit the following link: <a href='.$resetPassLink.'> click here </a></p>';
				$message .= '<h3><i>Thanks & Regards,<br>';
				$message .= 'Evoai Team</i></h3>';
				//$message_body = strip_tags($message);
				$post['username'] = $check_email->username;
				$post['resetPassLink'] = $resetPassLink;
				$message_body = $this->load->view('forgotPassword_template', $post, true);	
				$this->send_mail($email, $subject, $message_body);
				
				/* Insert to database forgot password */
				$CreateDate = date("Y-m-d");
				$CreateTime = date("H:i:s");
				$duration	= '+15 minutes';
				$ExpiryTime = date('H:i:s', strtotime($duration, strtotime($CreateTime)));

				$insert_data = array(
					'user_email' => $email, 
					'user_token' => $token_id, 
					'created_date' => $CreateDate, 
					'CreateTime' => $CreateTime, 
					'ExpiryTime' => $ExpiryTime
				);
				$this->db->insert('forgotpassword', $insert_data);
				
				$msg = 'Please check your email';
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');			
				$this->session->set_flashdata('success_message', $msg);
				redirect(base_url('home'));
			}
			else
			{
				$msg = 'Invalid email address';
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				$this->session->set_flashdata('error_message', $msg);
				redirect(base_url('home/forgotPassword'));
			}			
		}
		else{
			$this->data['title'] = 'forgotPassword';
			$this->show_viewFrontInner('forgotPassword', $this->data);	
		}
	}
	
	/* Reset Password */
	public function resetpassword()
	{
		$tokenidxs = $_GET['tokenidxs'];
		$result = $this->db->get_where('forgotpassword', array('user_token' => $tokenidxs, 'ExpiryTime >'=> date("H:i:s")))->row();		
		if($result)
		{
			$user_result = $this->db->get_where('users', array('email'=>$result->user_email))->row();			
			if($_POST['resetpassword'])
			{ 
				$user_data['password'] = md5($_POST['password']);
				$this->db->where('id',$user_result->id);
				$this->db->update('users', $user_data);
				$subject = 'Password Reset';				
				$message = '';
				$message = '<p>Hello '.$user_result->username.',</p>';				
				$message = '<p>Your password reset successfully</br>';	
				$message .= 'Login: <a href='.base_url().'>Click here</a></p>';
				$message .= '<h3><i>Thanks & Regards,<br>';
				$message .= 'Evoai Team</i></h3>';
				//$message_body = strip_tags($message);
				$post['username'] = $user_result->username;
				$post['resetPassLink'] = base_url('login');
				$message_body = $this->load->view('resetPassword_template', $post, true);	
				$this->send_mail($user_result->email, $subject, $message_body);
				$msg = 'Password Reset Successfull';
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');			
				$this->session->set_flashdata('success_message', $msg);
				redirect(base_url('home'));
			}
			else
			{
				$this->data['title'] = 'Resetpassword';
				$this->show_viewFrontInner('resetpassword', $this->data);	
			}
		}
		else
		{
			$msg = ' Do not matches your token, please try again';
			//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
			$this->session->set_flashdata('error_message', $msg);
			redirect(base_url('home'));
		}
	}
	
	/* Update profile */	
	public function profileupdate()
	{
		$tokenindex = @$_GET['tokenindex'];
		if($tokenindex)
		{
			$result = $this->db->get_where('changeprofile', array('user_token'=>$tokenindex, 'expire_time >'=>time()))->row();	
			if($result->user_email != '')
			{
				$post['username'] = $result->user_name;
				$post['eth_address'] = $result->user_eth_address;
				$this->db->where('id', $result->user_id);
				$this->db->update('users', $post);
				$msg = 'Profile update successful!';
				$this->session->set_flashdata('success_message', $msg);
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');			
				redirect(base_url('home'));
			}
			else
			{
				$msg = 'This token is not match any link';
				$this->session->set_flashdata('error_message', $msg);
				//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url('home'));
			}
		}
		else
		{
			$msg = 'This token is not match any link';
			$this->session->set_flashdata('error_message', $msg);
			//$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
			redirect(base_url('home'));
		}
	}
	
	/**
	| Intel function on home page
	*/
	public function intel()
	{
		$this->data['title'] = 'Intel';
		$this->show_viewFrontInner('intel', $this->data);
	}
	
	/**
	| Transaction
	*/	
	/* User bonus stored */
	public function coinTransaction()
	{ 
		$coinTransaction_result = $this->db->order_by('id', 'desc')->get_where('user_coin_transaction')->row();
		if($coinTransaction_result->update_time < time())
		{			
			$userList = $this->db->get_where('users', array('eth_address !='=> '', 'user_referenced_code !='=> '', 'user_referenced_code !='=> 0))->result();
			$userbalance = '';
			?>			
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<?php
			foreach($userList as $res)
			{		
				?>
					<script>
						var eth_add = '<?= $res->eth_address ?>';																					
						var web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/v3/baf22b6c2cd84003aa418a653eacecfa"));
						if(eth_add)
						{
							var tokenAddress = "0x5dE805154A24Cb824Ea70F9025527f35FaCD73a1";
							var walletAddress = "<?= $res->eth_address ?>";
							
							// The minimum ABI to get ERC20 Token balance
							var minABI = [
							  // balanceOf
							  {
								"constant":true,
								"inputs":[{"name":"_owner","type":"address"}],
								"name":"balanceOf",
								"outputs":[{"name":"balance","type":"uint256"}],
								"type":"function"
							  },
							  // decimals
							  {
								"constant":true,
								"inputs":[],
								"name":"decimals",
								"outputs":[{"name":"","type":"uint8"}],
								"type":"function"
							  }
							];

							// Get ERC20 Token contract instance
							var contract = web3.eth.contract(minABI).at(tokenAddress);

							// Call balanceOf function
							contract.balanceOf(walletAddress, (error, balance) => {
							  // Get decimals
								contract.decimals((error, decimals) => {
									// calculate a balance
									balance = balance.div(10**decimals);
									//consol.log('cointra...');
									//consol.log(balance);
									var user_balance = balance.toString();
									var dataString = 'user_id='+<?= $res->id ?>+'&current_value='+user_balance;
									$.ajax({
										url: '<?php echo base_url()?>home/currentTransaction',
										type: 'POST',
										data: dataString,
										success: function(responce){
										}
									});
								});
							});																						
						}
					</script>
				<?php
			}
			echo json_encode('success');
		}	
	}
	
	/**
	| currentTransaction
	*/
	public function currentTransaction()
	{
		$Bonus_details = $this->db->get_where('value_and_bonus', array('id'=>1))->row();
		$userID = $this->input->post('user_id');
		$current_value = $this->input->post('current_value');
		/*$referenced_code = $this->input->post('referenced_code');*/
		$userLastTransaction = $this->db->order_by('id', 'desc')->get_where('user_coin_transaction', array('user_id'=>$userID))->row();
		$old_value = 0;
		$bonus_value = 0;
		if($userLastTransaction->old_value > 0)
		{
			$old_value = $userLastTransaction->old_value;
			$calculate_bonus = $current_value - $old_value;
			if($calculate_bonus > 0)
			{
				$bonus_value = ($calculate_bonus * $Bonus_details->bonus / 100);
			}
			else
			{
				$bonus_value = 0;
			}
		}
		else
		{
			$bonus_value = ($current_value * $Bonus_details->bonus / 100);
		}
		
		$userReferancedCode = $this->db->get_where('users', array('id' => $userID))->row();
		$postData['user_id'] = $userID;
		$postData['current_value'] = $current_value;
		$postData['old_value'] = $current_value;
		$postData['bonus_value'] = $bonus_value;
		$postData['paid_value'] = 0;
		$postData['referenced_code'] = $userReferancedCode->user_referenced_code;
		$postData['time'] = time();
		$postData['update_time'] = strtotime('+24 hour');
		$this->db->insert('user_coin_transaction', $postData);
		echo $this->db->insert_id();
	}
	
	/**
	| User amount update
	*/
	public function tokenPaidStatus()
	{
		$coinTransaction_result = $this->db->order_by('id', 'desc')->get_where('user_coin_transaction')->row();
		if($coinTransaction_result->update_time < time())
		{			
			$SendToken_details = $this->db->get_where('token_send')->result();
			if($SendToken_details)
			{
				foreach($SendToken_details as $res)
				{
					$user_details = $this->db->get_where('users', array('eth_address'=> $res->to_address))->row();
					$coinTransaction_details = $this->db->order_by('id', 'desc')->get_where('user_coin_transaction', array('referenced_code'=>$user_details->user_referral_code, 'paid_value'=>0))->row();
					
					if($res->amount > 0)
					{
						$postdata['paid_value'] = $res->amount;
						$this->db->where('id', $coinTransaction_details->id);				
						$this->db->where('user_id', $coinTransaction_details->user_id);				
						$this->db->where('time', $coinTransaction_details->time);	
						$this->db->update('user_coin_transaction', $postdata);
					}
				}
			}
		}		
		echo 'success';
	}
	
	public function logout()
	{	
	    $this->session->unset_userdata('Ref_UserID');
	    $this->session->set_userdata('Ref_UserID', '');
        $this->session->unset_userdata('Ref_UserName');
        $this->session->set_userdata('Ref_UserName', '');
        $this->session->unset_userdata('Ref_logged_in');
        $this->session->set_userdata('Ref_logged_in', '');
        $this->session->unset_userdata('Ref_UserEmail');
        $this->session->set_userdata('Ref_UserEmail', '');
        $this->session->sess_destroy();		
		$this->session->set_flashdata('success_message', 'Logout successfully');
		redirect(base_url('home'));
 	}
}
