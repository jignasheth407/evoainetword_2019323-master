<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Exchange extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Exchange
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{
			$this->data['menuId'] = 'Exchange';			
			$this->data['title'] = 'Exchange';						
			$this->show_viewFrontInner('exchange', $this->data); 
		}
		else
		{
			redirect('home');
		}					
 	}		
}
