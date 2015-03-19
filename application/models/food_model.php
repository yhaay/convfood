<?php
class Food_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function select($option)
	{
		$order_by = $option['order_by'];
		$limit = $option['limit'];
		
		if ($order_by == 'best')
			$this->db->order_by('rate', 'desc');
		else if ($order_by == 'new')
			$this->db->order_by('writedate', 'desc');
		
		$this->db->limit($limit);
		
		$this->db->select('*, (select count(*) from comment where foodidx=food.foodidx) as commentcount, (select count(*) from rate where foodidx=food.foodidx) as ratecount', false);
		$this->db->from('food');
		return $this->db->get();
	}
	
	function select_by_idx($idx)
	{
		$this->db->select('*, (select count(*) from comment where foodidx=food.foodidx) as commentcount, (select count(*) from rate where foodidx=food.foodidx) as ratecount, (select name from company where companyidx=food.companyidx) as company', false);
		$this->db->where('foodidx', $idx);
		$this->db->from('food');
		return $this->db->get();
	}
	
	function select_paging($option)
	{
		$order_by = $option['order_by'];
		$num = (int)$option['num'];
		$keyword = $option['keyword'];
		$company = $option['company'];
		
		if ($keyword != '')
			$this->db->like('name', $keyword);
		
		if ($company != '')
			$this->db->where('companyidx', $company);
				
		if ($order_by == 'best')
			$this->db->order_by('rate', 'desc');
		else if ($order_by == 'new')
			$this->db->order_by('writedate', 'desc');
		
		$this->db->limit(16, 16 * $num);
		$this->db->select('*, (select count(*) from comment where foodidx=food.foodidx) as commentcount, (select count(*) from rate where foodidx=food.foodidx) as ratecount', false);
		$this->db->from('food');
		
		return $this->db->get();
	}
	
	function update_rate($option)
	{
		$this->db->set('rate', '(select avg(rate) from rate where foodidx=food.foodidx)', false);
		$this->db->where($option);
		$this->db->update('food');
		return 'success';
	}
}
