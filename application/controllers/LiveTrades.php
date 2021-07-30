<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class LiveTrades extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Live Trades
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Live Trades';						
			$this->data['menuId'] = 'Live_Trades';						
			$this->show_viewFrontInner('liveTrades', $this->data); 
		}
		else
		{
			redirect('home');
		}
 	}		
}
