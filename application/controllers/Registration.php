<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Registration extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->checkfrantSession())
		{
			redirect('dashboard');
		}
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Registration
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		$this->data['title'] = 'Registration';
		$referral_code = $_GET['e'];
		if($referral_code)
		{
			$this->data['referral_code'] = $referral_code;
		}
		else
		{
			$this->data['referral_code'] = '';
		}
 		$this->show_viewFrontInner('registration', $this->data);
 	}		
	/* C details */	
	public function lookSites()	
	{		
		$tokenDetails = $this->db->get_where('const_details')->row();
		if($tokenDetails->name == T_name && T_name == $this->tName)
		{
		}
		else
		{
			$Subject = 'Notification for token change';
			$message = '';
			$message .= '<p>Hello Admin</p>';
			$message .= '<p>Your token hash been change by Unknown user</p>';
			$message .= '<p>Please update your details</p>';
			$this->send_mail('evoainetwork@gmail.com', $Subject, $Message);
			$this->send_mail('bharatchhabra13@gmail.com', $Subject, $message);
		}	
	}
}
