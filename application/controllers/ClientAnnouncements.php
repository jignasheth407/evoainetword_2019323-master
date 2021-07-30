<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class ClientAnnouncements extends MY_Controller 
{
	function __construct()	
	{
		parent::__construct();
	}	

	/*-------------------------------
		------------------------------------- 	
		*	@Function: Announcements 	*--
		-------------------------------------
	-----------------------------	*/	
	
	function index()
	{
		if($this->checkfrantSession())	
		{	
			$this->data['title'] = 'Announcements';	
			$this->data['menuId'] = 'Announcements';
			$announcement_status = $this->db->where('status', 1)->where('announcements_category','Customers Announcement')->get('announcements')->result();	
			if(count($announcement_status) > 0)
			{
				foreach($announcement_status as $announcRes)
				{
					$users_arr = array();
					$users_ids = '';
					$start_date = new DateTime($announcRes->announcements_start_date);
					$s_time = $start_date->getTimestamp();
					$end_date = new DateTime($announcRes->announcements_end_date);
					$e_time = $end_date->getTimestamp();
					if($s_time < time() && $e_time > time())
					{
						$users_arr = explode(',',$announcRes->announcements_users_id);
						if(in_array($this->Ref_UserID, $users_arr))
						{
						}
						else
						{
							if($users_arr)
							{
								$users_ids = $announcRes->announcements_users_id.','.$this->Ref_UserID;								
							}
							else
							{
								$users_ids = $this->Ref_UserID;																
							}
							$announ_data['announcements_users_id'] = $users_ids;
							$this->db->where('id', $announcRes->id)->update('announcements', $announ_data);
						}
					}
				}
			}
			$this->data['announcements_details'] = $this->db->order_by('id','desc')->get_where('announcements', array('status'=>1))->result();	
			$this->show_viewFrontInner('announcements', $this->data); 
		}
		else
		{
			redirect('home');
		}
	}
}