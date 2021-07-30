<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Logout extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->Ref_UserID = $this->session->userdata('Ref_UserID');
		$this->load->helper(array('url','language'));
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Logout
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		$this->session->unset_userdata('Ref_UserID');
	    $this->session->set_userdata('Ref_UserID', '');
        $this->session->unset_userdata('Ref_UserName');
        $this->session->set_userdata('Ref_UserName', '');
        $this->session->unset_userdata('Ref_logged_in');
        $this->session->set_userdata('Ref_logged_in', '');
        $this->session->unset_userdata('Ref_UserEmail');
        $this->session->set_userdata('Ref_UserEmail', '');
        $this->session->set_userdata('Ref_beta_role', '');
        $this->session->unset_userdata('Ref_beta_role');
        $this->session->set_userdata('Ref_super_role', '');
        $this->session->unset_userdata('Ref_super_role');
        $this->session->sess_destroy();	
		unset($_SESSION);
		$this->session->set_flashdata('success_message', 'Logout successfully');		
		redirect(base_url('login'));
 	}
}
