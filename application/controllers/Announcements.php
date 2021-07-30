<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Announcements extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Announcement
 	*---------------------------------------------------------------------
	*/
	function index()
	{
		$this->data['title'] = 'Announcements';		
		$this->data['menuId'] = 'Announcements';
		$this->data['announcements_details'] = $this->db->get_where('announcements', array('status'=>1))->result();			
		$this->show_viewFrontInner('announcements_public', $this->data); 		
 	}	

	/* Announcement details */	
	public function details($title)
	{
		$this->data['title'] = 'Announcements';		
		$this->data['menuId'] = 'Announcements';
		$announcements_title = str_replace('_',' ',$title);
		$this->data['announcements_details'] = $this->db->get_where('announcements', array('status'=>1, 'announcements_title'=>$announcements_title))->row();			
		$this->show_viewFrontInner('announcements_details', $this->data); 		
	}
	
	/* searchAnnouncement */
	function searchAnnouncementPOST()
	{
		$title = $_POST['title'];
		$cat_name = $_POST['cat_name'];		
		$HTML = '';
		if($cat_name)
		{
			$result = $this->Front_model->searchAnnouncement($title, $cat_name);
			if($result)
			{
				$this->data['announcements_details'] = $result;
				$HTML = $this->load->view('announcementSearch', $this->data, true);
			}			
		}
		echo $HTML;
	}
}
