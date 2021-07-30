<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TokenSend extends MY_Controller 
{ 
	function __construct()
	{
		parent::__construct();
		if($this->checkSessionAdmin())
		{
			if($this->admin_id)
			{
				if($this->admin_id == 1 || $this->admin_id == 2)
				{
					
				}
				else
				{				
					return false;
					redirect(base_url().'admin/dashboard/notPermitted');
				}
			}
		}		
	}
	
	/**
	| Index function for this controller
	*/
	public function index()
	{		
		if($this->checkSessionAdmin())
		{
			$this->data['token_list'] = $this->db->order_by('id', 'desc')->get_where('token_send')->result(); 
			$this->show_viewAdmin('admin/tokenSend', $this->data);
		}
		else
		{
			$this->load->view('admin/login');
		}
    }
	
	/**
	| token Send list
	*/
	public function tokenSend_list()
	{
		if($this->checkSessionAdmin())
		{
			$this->data['token_list'] = $this->db->order_by('id', 'desc')->get_where('token_send')->result(); 
			$this->show_viewAdmin('admin/tokenSend_list', $this->data);
		}
		else
		{
			$this->load->view('admin/login');
		}
	}
	
	/**
	| dataStored function for this controller
	*/
	public function dataStored()
	{
		$postData['token_address'] = $this->input->post('token_address');
		$to_address = $this->input->post('to_address');
		$postData['decimals'] = 18;
		$amount = $this->input->post('amount');
		$postData['transaction_id'] = $this->input->post('transaction_id');
		$postData['time'] = time();
		$RRR = 0;
		foreach($to_address as $res)
		{
			$postData['to_address'] = $res;
		}
		foreach($amount as $res)
		{
			$postData['amount'] = $res;
		}
		for($i=0; $i<count($amount); $i++)
		{		
			$this->db->insert('token_send', $postData);			
			$RRR = $this->db->insert_id();
		}
		echo $RRR;
		exit();
	}
}
/* End of file */