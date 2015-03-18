<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myinfo extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		redirect('/myinfo/history');
	}
	
	public function history()
	{
		$this->load->view('head');
		
		$this->load->model('rate_model');
		$this->load->model('food_model');
		$this->load->model('comment_model');

		$option = array('useridx'=>$this->session->userdata('useridx'));
		$rate = $this->rate_model->select($option)->result();
		
		foreach ($rate as $row) {
			$food = $this->food_model->select_by_idx($row->foodidx)->row();
			$row->name = $food->name;
			$row->filepath = $food->filepath;
			$row->rate = $food->rate;
		}
		
		
		
		$this->load->view('footer');
	}
}