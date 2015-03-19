<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Only extends CI_Controller {

	public function index()
	{
		$this->load->view('head');
		$this->load->view('footer');
	}
	
	public function comment($lastidx)
	{
		$this->load->model('comment_model');
		$option = array(
				'order_by'=>'new',
				'limit'=>10,
				'lastidx'=>$lastidx
		);
		$list_comment = $this->comment_model->select_by_lastidx($option)->result();
		$this->load->view('only_comment', array('list_comment'=>$list_comment));
	}
	
	public function food($order_by)
	{
		$num = $this->input->get('num');
		$company = $this->input->get('company');
		$keyword = $this->input->get('keyword');
		$this->load->model('food_model');
		$option = array(
				'order_by' => $order_by,
				'num' => $num,
				'keyword' => $keyword,
				'company' => $company
		);
		$list_food = $this->food_model->select_paging($option)->result();
		$this->load->view('only_food', array('list_food'=>$list_food, 'order_by'=>$order_by, 'num'=>$num, 'keyword'=>$keyword, 'company'=>$company));
	}
	
	public function search()
	{
		$keyword = $this->input->get('keyword');
		$this->load->view('head');
		$this->load->view('listed_search', array('keyword'=>$keyword));
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */