<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Evabot extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Evabot
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{
			$this->data['menuId'] = 'Evabot';			
			$this->data['title'] = 'Evabot';						
			$this->show_viewFrontInner('evabot', $this->data); 
		}
		else
		{
			redirect('home');
		}				
 	}		
}
