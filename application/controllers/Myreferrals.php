<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Myreferrals extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Myreferrals
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'My referrals';						
			$this->data['menuId'] = 'My_referrals';		
			$user_result = $this->db->get_where('users', array('id'=>$this->Ref_UserID))->row();
			$this->data['links'] = $user_result->user_referral_code;
			$this->data['user_result'] = $user_result;
			$this->data['user_list'] = $this->db->order_by("id","desc")->get_where('users', array('user_referenced_code'=>$user_result->user_referral_code))->result();			$this->data['bonus_result'] = $this->db->get_where('user_coin_transaction', array('referenced_code'=>$user_result->user_referral_code))->result();
			$this->show_viewFrontInner('myreferrals', $this->data); 
		}
		else
		{
			redirect('login');
		}
 	}		
}
