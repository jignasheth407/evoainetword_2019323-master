<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class EvoIntel extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: EvoIntel
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{
			$this->data['menuId'] = 'EvoIntel';			
			$this->data['title'] = 'EvoIntel';						
			$this->show_viewFrontInner('evoIntel', $this->data); 
		}
		else
		{
			redirect('home');
		}					
 	}		
}
