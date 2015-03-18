<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		$this->load->view('footer');
	}
	
	public function login()
	{
		$this->load->view('head');
		$this->load->view('auth_login');
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('head');
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_error_delimiters('<font color=red><b>', '</b></font><br>');
		$this->form_validation->set_message('required', '%s 입력해주세요.');
		$this->form_validation->set_message('min_length', '%s 길이가 너무 짧습니다.');
		$this->form_validation->set_message('max_length', '%s 길이가 너무 깁니다.');
		$this->form_validation->set_message('valid_email', '이메일 형식이 올바르지 않습니다.');
		$this->form_validation->set_message('is_unique', '중복되는 %s입니다.');
		$this->form_validation->set_message('matches', '%s가 일치하지 않습니다.');
		
		$this->form_validation->set_rules('name', '이름', 'required|min_length[2]|max_length[20]|is_unique[user.name]');
		$this->form_validation->set_rules('email', '이메일', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[30]|matches[password-repeat]');
		$this->form_validation->set_rules('password-repeat', '비밀번호 확인', 'required');
		
		if ($this->form_validation->run() === false) {
			$this->load->view('auth_register');
		} else {
			if(!function_exists('password_hash')) {
				$this->load->helper('password');
			}
			$hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			
			$this->load->model('user_model');
			$this->user_model->insert(array(
					'name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'password'=>$hash			
			));
			
			$this->session->set_flashdata('message', '회원가입되었습니다.');
			$this->load->helper('url');
			redirect('/');
		}
		
		$this->load->view('footer');
	}
	
	public function authentication()
	{
		$this->load->model('user_model');
		$user = $this->user_model->select(array('email'=>$this->input->post('email')))->row();
		if (!function_exists('password_hash')) {
			$this->load->helper('password');
		}
		if ($this->input->post('email') == $user->email && password_verify($this->input->post('password'), $user->password)) {
			$this->session->set_userdata('is_login', true);
			$this->session->set_userdata('useridx', $user->useridx);
			$this->session->set_userdata('name', $user->name);
			$this->session->set_userdata('email', $user->email);
			
			if ($this->input->post('remember-me')) {
				$this->session->sess_expire_on_close = TRUE;
			}
			
			$this->load->helper('url');
			redirect('/');
		} else {
			$this->session->set_flashdata('message', '로그인에 실패했습니다.');
			$this->load->helper('url');
			redirect('auth/login');
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */