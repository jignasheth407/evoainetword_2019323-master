<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class HelpSupport extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Help Support
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Help Support';	
			$this->data['menuId'] = 'Support';
			$this->data['support_list'] = $this->db->order_by('id', 'desc')->get_where('support', array('user_id'=>$this->Ref_UserID))->result();			
			$this->show_viewFrontInner('helpSupport', $this->data); 
		}
		else
		{
			redirect('login');
		}
 	}		
	
	/* Ticket details */
	public function ticketDetails()
	{
		if($this->checkfrantSession())
		{ 
			$id = $_GET['t'];
			$this->data['title'] = 'Ticket Details';	
			$this->data['menuId'] = 'Support';
			$this->data['supportChat_list'] = $this->db->get_where('support_chat', array('ticket'=>$id))->result();				
			$this->show_viewFrontInner('ticketDetails', $this->data); 
		}
		else
		{
			redirect('login');
		}
	}
	
	/* Support chat */
	public function supportChat_live()
	{
		if($this->checkfrantSession())
		{ 
			$id = $_GET['ticket'];
			$supportChat_list = $this->db->get_where('support_chat', array('ticket'=>$id))->result();	
			$HTML = '';
			if($supportChat_list)
			{
				$this->data['supportChat_list'] = $supportChat_list;
				$HTML = $this->load->view('supportChat_live', $this->data);
			}
			echo $HTML;
		}
		else
		{
			redirect('login');
		}
	}
	
	/* SupportReply */
	public function supportReply()
	{
		if($this->checkfrantSession())
		{
			$data['message'] = $_POST['message'];
			$data['ticket'] = $_POST['ticket'];
			$data['to_id'] = $_POST['to_id'];
			$data['from_id'] = 0;
			$data['created_date'] = date('d-m-Y');
			$this->db->insert('support_chat', $data);
			$last_id = $this->db->insert_id();
			
			$supportChat_list = $this->db->get_where('support_chat', array('ticket'=>$data['ticket']))->result();	
			$HTML = '';
			if($supportChat_list)
			{
				$this->data['supportChat_list'] = $supportChat_list;
				$HTML = $this->load->view('supportChat_live', $this->data);
			}
			echo $HTML;
		}
		else
		{
			redirect('login');
		}
	}
	
	/* ticketClose */
	public function ticketClose()
	{
		if($this->checkfrantSession())
		{
			$id = $_GET['t'];
			$data['status'] = 1;
			$this->db->where('id', $id);
			$this->db->update('support', $data);
			$this->db->where('ticket', $id);
			$this->db->update('support_chat', $data);
			redirect(base_url('helpSupport/ticketDetails?t='.$id));
		}
		else
		{
			redirect('login');
		}
	}
}
