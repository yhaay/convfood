<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listed extends CI_Controller {

	public function index()
	{
		$this->load->view('head');
		$this->load->view('footer');
	}
	
	public function comment()
	{
		$this->load->view('head');
		$this->load->model('comment_model');
		$lastidx = $this->comment_model->get_lastidx();
		$this->load->view('listed_comment', array('lastidx'=>$lastidx));
		$this->load->view('footer');
	}
	
	public function food($order_by)
	{
		$this->load->view('head');
		$this->load->view('listed_food', array('order_by'=>$order_by, 'company'=>$this->input->get('company')));
		$this->load->view('footer');
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