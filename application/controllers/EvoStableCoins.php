<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EvoStableCoins extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();		
	}
	
	/*
	| index function for this controller
	*/
	public function index()
	{		
		if($this->checkfrantSession())
		{
			$this->data['menuId'] = 'EvoStableCoins';			
			$this->data['title'] = 'Evo Stable Coins';						
			$this->show_viewFrontInner('evoStableCoins', $this->data); 
		}
		else
		{
			redirect('home');
		}
    }
}

/* End of file */?>