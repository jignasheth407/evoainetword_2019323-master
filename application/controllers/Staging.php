<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Staging extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Staging
 	*---------------------------------------------------------------------
	*/
	public function index()
	{						
		$this->data['title'] = 'Staging';
		$this->data['video_list'] = $this->db->get_where('premium_video', array('status'=>1))->result();
		$this->show_viewFrontInner('staging', $this->data);				
	}
}