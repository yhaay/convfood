<?php
class Comment_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function select($option)
	{
		$order_by = $option['order_by'];
		$limit = $option['limit'];
		
		if ($order_by == 'new')
			$this->db->order_by('writedate', 'desc');
		
		$this->db->limit($limit);
		
		$this->db->select('*, (select name from food where foodidx=comment.foodidx) as foodname, ifnull((select rate from rate where foodidx=comment.foodidx and useridx=comment.useridx),-1) as rate', false);
		$this->db->from('comment');
		
		return $this->db->get();
	}
	
	function select_by_lastidx($option)
	{
		$order_by = $option['order_by'];
		$limit = $option['limit'];
		$lastidx = $option['lastidx'];
		
		if (is_numeric($lastidx)) {
			$this->db->where('commentidx<',$lastidx,false);
		} else {
			$this->load->helper('url');
			redirect('/');
		}
		
		if ($order_by == 'new')
			$this->db->order_by('commentidx', 'desc');
		
		$this->db->limit($limit);
		$this->db->select('*, (select name from food where foodidx=comment.foodidx) as foodname, ifnull((select rate from rate where foodidx=comment.foodidx and useridx=comment.useridx),-1) as rate', false);
		$this->db->from('comment');
		return $this->db->get();
	}
	
	function select_by_foodidx($option)
	{
		$this->db->select('*, ifnull((select rate from rate where foodidx=comment.foodidx and useridx=comment.useridx),-1) as rate', false);
		$this->db->limit(10);
		$this->db->order_by('writedate','desc');
		$this->db->where('foodidx',$option);
		$this->db->from('comment');
		
		return $this->db->get();
	}
	
	function insert($comment)
	{
		$this->db->set('writedate', 'NOW()', false);
		$this->db->insert('comment', $comment);
		$result = $this->db->insert_id();
		return $result;
	}
	
	function get_lastidx()
	{
		$this->db->select('max(commentidx) as maxcommentidx');
		$this->db->from('comment');
		
		return $this->db->get()->row()->maxcommentidx;
	}

}
