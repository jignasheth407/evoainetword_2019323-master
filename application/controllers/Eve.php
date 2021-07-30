<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Eve extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Eve
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{
			$this->data['menuId'] = 'Eve';			
			$this->data['title'] = 'Eve';						
			$this->show_viewFrontInner('eve', $this->data); 
		}
		else
		{
			redirect('home');
		}					
 	}		
}
