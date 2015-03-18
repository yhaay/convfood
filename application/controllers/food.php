<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Food extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('head');
		$this->load->view('main');
		$this->load->view('footer');
	}
	
	public function detail($idx)
	{
		$this->load->view('head');
		
		$this->load->model('food_model');
		$food = $this->food_model->select_by_idx($idx)->row();
		if (is_null($food)) {
			$this->load->helper('url');
			redirect('/');
		}
		
		$this->load->model('comment_model');
		$comment = $this->comment_model->select_by_foodidx($idx)->result();
		
		$this->load->model('rate_model');
		$rate = $this->rate_model->select(array('useridx'=>$this->session->userdata('useridx'), 'foodidx'=>$idx))->row();
		if (empty($rate) || $this->session->userdata('is_login')==false)
			$rate = '3';
		else
			$rate = $rate->rate;

		$this->load->view('food_detail', array('food'=>$food, 'comment'=>$comment, 'rate'=>$rate));
		
		$this->load->view('footer');
	}
	
	public function insert_comment()
	{
		if (!$this->session->userdata('is_login')) {
			echo 'fail';
			return;
		}
		
		$comment = array (
				'description'=>$this->input->post('description'),
				'foodidx'=>$this->input->post('foodidx'),
				'useridx'=>$this->session->userdata('useridx'),
				'name'=>$this->session->userdata('name'),
				'email'=>$this->session->userdata('email')
		);
		$this->load->model('comment_model');
		$this->comment_model->insert($comment);
		echo 'success';
	}
	
	public function insert_rate()
	{
		if (!$this->session->userdata('is_login')) {
			echo 'fail';
			return;
		}
		
		$rate = array (
				'rate'=>$this->input->post('rate'),
				'foodidx'=>$this->input->post('foodidx'),
				'useridx'=>$this->session->userdata('useridx'),
				'name'=>$this->session->userdata('name'),
				'email'=>$this->session->userdata('email')
		);
		$old_rate = array (
				'foodidx'=>$this->input->post('foodidx'),
				'useridx'=>$this->session->userdata('useridx')
		);
		
		$this->load->model('rate_model');
		$this->rate_model->delete($old_rate);
		$this->rate_model->insert($rate);
		
		$this->load->model('food_model');
		$this->food_model->update_rate(array('foodidx'=>$this->input->post('foodidx')));
		
		echo 'success';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */