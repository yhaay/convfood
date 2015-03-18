<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		
		$this->load->model('food_model');
		$this->load->model('comment_model');
		
		$option_best = array(
				'order_by'=>'best',
				'limit'=>'4'	
		);
		$option_new = array(
				'order_by'=>'new',
				'limit'=>'4'
		);
		$option_comment = array(
				'order_by'=>'new',
				'limit'=>'10'
		);
		
		$list_best = $this->food_model->select($option_best)->result();
		$list_new = $this->food_model->select($option_new)->result();
		$list_comment = $this->comment_model->select($option_comment)->result();
		
		$this->load->view('main', array('list_best'=>$list_best, 'list_new'=>$list_new, 'list_comment'=>$list_comment));
		
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */