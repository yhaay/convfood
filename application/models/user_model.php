<?php
class User_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function insert($option)
	{
		$this->db->set('name', $option['name']);
		$this->db->set('email', $option['email']);
		$this->db->set('password', $option['password']);
		$this->db->set('writedate', 'NOW()', false);
		
		$this->db->insert('user');
		$result = $this->db->insert_id();
		return $result;
	}
	
	function select($option)
	{
		$this->db->where($option);
		$this->db->from('user');
		return $this->db->get();
	}
	
	function update($option)
	{
		$this->db->where('useridx',$option['useridx']);
		$this->db->update('user',$option);
		return 'success';
	}

}
