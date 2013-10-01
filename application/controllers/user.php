<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Guest {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'user');
	}

	/**
	 * redirect to login
	 * @return void
	 */
	public function index()
	{
		$this->login();
	}

	/**
	 * Load Default view of Login
	 * @return void
	 */
	public function login()
	{
		$data = array
		(
			'pageTitle'		=>	'Login'
		);

		$this->load->view('layouts/narrow', $data);
	}

	/**
	 * Validate user login
	 * @return void 
	 */
	public function validate()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$isLoggedIn = $this->user->processLogin($this->input->post('username'), $this->input->post('password'));

			if($isLoggedIn) redirect('dashboard');
			else
			{
				$this->session->set_flashdata('error', 'Error in username or password');
				redirect();
			}
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */