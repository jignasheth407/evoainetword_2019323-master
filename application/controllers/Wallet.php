<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Wallet extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Wallet
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Wallet';	
			$this->data['menuId'] = 'Wallet';		
			$this->show_viewFrontInner('wallet', $this->data); 
		}
		else
		{
			redirect('login');
		}
 	}	
	
	/*--------------------------------------------------------------------
 	*	@Function: Add API Keys
 	*---------------------------------------------------------------------
	*/
	function add_API_Keys()
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Add API Keys';	
			$this->data['menuId'] = 'Add_API_Keys';		
			$this->show_viewFrontInner('add_API_Keys', $this->data); 
		}
		else
		{
			redirect('login');
		}
 	}	
	
	/*--------------------------------------------------------------------
 	*	@Function: Arbitrage Opportunities
 	*---------------------------------------------------------------------
	*/
	function arbitrage_Opportunities()
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Arbitrage Opportunities';	
			$this->data['menuId'] = 'Arbitrage_Opportunities';		
			$this->show_viewFrontInner('arbitrage_Opportunities', $this->data); 
		}
		else
		{
			redirect('login');
		}
 	}	 
	
	/*--------------------------------------------------------------------
 	*	@Function: Tickers
 	*---------------------------------------------------------------------
	*/
	function tickers()
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Tickers';	
			$this->data['menuId'] = 'tickers';		
			$this->show_viewFrontInner('tickers', $this->data); 
		}
		else
		{
			redirect('login');
		}
 	}		
	
	/*--------------------------------------------------------------------
 	*	@Function: Trade
 	*---------------------------------------------------------------------
	*/
	function trade()
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Trade';	
			$this->data['menuId'] = 'trade';		
			$this->show_viewFrontInner('trade', $this->data); 
		}
		else
		{
			redirect('login');
		}
 	}		
}
