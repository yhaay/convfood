<?php
class Rate_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function insert($rate)
	{
		$this->db->set('writedate', 'NOW()', false);
		$this->db->insert('rate', $rate);
		$result = $this->db->insert_id();
		return $result;
	}
		
	function select($option)
	{
		$this->db->where($option);
		$this->db->from('rate');
		return $this->db->get();
	}
	
	function delete($option)
	{
		$this->db->where($option);
		$this->db->delete('rate');
		return 'success';
	}

}
