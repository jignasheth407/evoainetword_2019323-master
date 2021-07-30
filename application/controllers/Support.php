<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Support extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: index
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Support';					
			$this->data['menuId'] = 'Support';							
			$this->show_viewFrontInner('support', $this->data); 
		}
		else
		{
			redirect('login');
		}				
 	}	
	
	/*--------------------------------------------------------------------
 	*	@Function: Store data
 	*---------------------------------------------------------------------
	*/
	function storeData()
	{
		if($this->checkfrantSession())
		{
			$postData = $this->input->post();
			$postData['user_id'] = $this->Ref_UserID;
			$this->db->insert('support', $postData);
			$lastID = $this->db->insert_id();
			
			$data['ticket'] = $lastID;
			$data['to_id'] = $this->Ref_UserID;
			$data['from_id'] = 0;
			$data['message'] = $postData['message'];
			$data['created_date'] = date('d-m-Y');
			$this->db->insert('support_chat', $data);
			if($lastID)
			{
				$a_subject = 'Generate new ticket on evoai network support';
				$a_message = '';
				$a_message .= '<p>Hello Admin,</p>';
				$a_message .= '<p>Generate new ticket on evoai network support</p>';
				$a_message .= '<p>Ticket number : 00'.$lastID.'</p>';
				$a_message .= '<p><b>Message</b> : '.$data['message'].'</p>';
				$post['username'] = 'Admin';
				$post['ticketNo'] = $lastID;
				$post['message'] = $data['message'];
				$message_body = $this->load->view('supportSendEmail_template', $post, true);	
				$this->send_mail(ADMIN_EMAIL, $a_subject, $message_body);
				$admin_list = $this->db->select('admin_role, admin_email, admin_name')->get_where('admin', array('admin_active_inactive'=>1))->result();
				if($admin_list)
				{
					foreach($admin_list as $adminRes)
					{
						$adminRole = unserialize($adminRes->admin_role);
						if(in_array('Support', $adminRole))
						{
							$sa_message = '';
							$sa_message .= '<p>Hello '.$adminRes->admin_name.',</p>';
							$sa_message .= '<p>Generate new ticket on evoai network support</p>';
							$sa_message .= '<p>Ticket number : 00'.$lastID.'</p>';
							$sa_message .= '<p><b>Message</b> : '.$data['message'].'</p>';
							$post_sadmin['username'] = $adminRes->admin_name;
							$post_sadmin['ticketNo'] = $lastID;
							$post_sadmin['message'] = $data['message'];
							$message_body_s = $this->load->view('supportSendEmail_template', $post_sadmin, true);	
							$this->send_mail($adminRes->admin_email, $a_subject, $message_body_s);
						}
					}
				}
				$msg = 'Details are stored successfully';					
				$HTML = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div>';
				echo $HTML;
			}
			else
			{
				$msg = 'Data are not stored successfull';
				$HTML = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div>';			
				echo $HTML;
			}
		}
		else
		{
			$msg = 'Found some error in store data';
			$HTML = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div>';			
			echo $HTML;
		}
 	}
}
