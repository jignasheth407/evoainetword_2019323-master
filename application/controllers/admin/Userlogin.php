<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userlogin extends MY_Controller 
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
	
	/* Login user list show */
	public function index()
	{		
		if($this->checkSessionAdmin())
		{
			$this->data['userLogin_list'] = $this->db->order_by('id', 'desc')->get_where('login_user')->result();
			$this->show_viewAdmin('admin/userLogin_list', $this->data);
		}
		else
		{
			$this->load->view('admin/login');
		}
    }
}
/* End of file */