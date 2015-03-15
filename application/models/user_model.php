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
		$result = $this->db->where($option)->row();
		var_dump($this->db->last_query());
		return $result;
	}

}
