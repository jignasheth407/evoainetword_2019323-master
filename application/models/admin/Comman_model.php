<?php

class Comman_model extends CI_Model 
{
	function __construct()
	{
       parent::__construct();
	   $this->load->database();
	}
	
	/*	Show all details  */
	public function show_allDetails($table_name)
	{
		$this->db->select('*');
		$this->db->from($table_name); 	
		$query = $this->db->get();
		return $query->result() ;
	}
	
	/* Add new details  */	
	public function add_details($table_name, $post)
	{
		$this->db->insert($table_name, $post);
		$this->result = $this->db->insert_id() ; 
		return $this->result ;
	}
	
	/* Edit details */
	public function edit_details($table_name, $field_id, $select_id)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($field_id, $select_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	/* Update details */
	public function update_details($table_name, $data, $field_id, $select_id)
	{
		$this->db->where($field_id, $select_id);
		$this->db->update($table_name, $data);
		return true;
	}
	
	/* Delete detail */
	function delete_detail($table_name, $field_id, $select_id)
	{
		$this->db->delete($table_name, array($field_id => $select_id));		
		return 1;		
	}		
	
	/* User and support table */	
	public function supportDetails()	
	{
		$this->db->select('a.*, a.id as u_id, b.*, b.id as s_id');
		$this->db->from('users a');
		$this->db->join('support b', 'a.id = b.user_id', 'inner');
		$this->db->order_by('b.id',"desc");		
		$query = $this->db->get();		
		return $query->result() ;	
	}
	
	/**
	| user Bonus by Group
	*/
	public function userBonus_byGroup()
	{
		$this->db->select('a.*, b.user_referral_code');
		$this->db->from('user_coin_transaction a');
		$this->db->join('users b', 'a.referenced_code = b.user_referral_code', 'inner');
		$this->db->group_by('paid_value');
		$query = $this->db->get();
		return $query->result();
	}
}
?>