<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Academy extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Academy
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{
			$this->data['menuId'] = 'Academy';			
			$this->data['title'] = 'Academy';						
			$this->show_viewFrontInner('academy', $this->data); 
		}
		else
		{
			redirect('home');
		}					
 	}		
}
