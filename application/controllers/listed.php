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
		$this->load->view('listed_comment');
		$this->load->view('footer');
	}
	
	public function cupnoodle($option)
	{
		$this->load->view('head');
		
		if ($option == 'all')
		{
			$this->load->view('listed_cupnoodle');
		}
		
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