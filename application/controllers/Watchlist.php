<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Watchlist extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Watchlist
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{
			$this->data['menuId'] = 'Watchlist';			
			$this->data['title'] = 'Watchlist';						
			$this->show_viewFrontInner('watchlist', $this->data); 
		}
		else
		{
			redirect('home');
		}					
 	}		
}
