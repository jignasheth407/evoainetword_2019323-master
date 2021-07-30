<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Evobot extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Evobot
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{
			$this->data['menuId'] = 'Evobot';			
			$this->data['title'] = 'Evobot';						
			$this->show_viewFrontInner('evobot', $this->data);
		}
		else
		{
			redirect('home');
		}			 
 	}		
}
