<?php

class Front_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	/* Get all data from database table */
	public function get_allData($table_name)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	
	/* Get all data from database table */
	public function get_allDataAscName($field, $table_name)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('status', '1');
		$this->db->order_by($field, 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	
	/* Get selected details */
	public function edit_getDetails($table_name, $field_id, $select_id)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($field_id, $select_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	/* Store data from database table */
	public function insert_dataTable($table_name,$post)
	{
		$this->db->insert($table_name, $post);
		$this->result = $this->db->insert_id() ; 
		return $this->result ;
	}
	
	/* Update put data in database table */
	public function update_dataTable($table_name, $post, $field_id, $field_value)
	{
		$this->db->where($field_id, $field_value);
		$this->db->update($table_name, $post);
		return true;
	}
	
	/* Delete detail */
	function delete_fiendDetail($table_name, $select_id)
	{
		$this->db->delete($table_name, array($select_id => $select_id));		
		return 1;		
	}		
	
	/* Search Announcement */	
	function searchAnnouncement($title, $cat_name)	
	{
		$this->db->select('*');	
		$this->db->from('announcements');
		if($cat_name == 'what_s_new')
		{	
			$this->db->where('announcements_category', 'What`s new');
		}
		elseif($cat_name == 'system_announ')
		{	
			$this->db->where('announcements_category', 'System update');
		}
		elseif($cat_name == 'campaign_announ')
		{	
			$this->db->where('announcements_category', 'Campaign');	
		}
		$this->db->like('announcements_title', $title);	
		$query = $this->db->get();
		return $query->result();
	}
}
?>