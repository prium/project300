<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Auth {

	/**
	 * Loads default dashboard
	 * @return void
	 */
	public function index()
	{
		$data = array
		(
			'pageTitle'		=>	'Dashboard',
			'pageLocation'	=>	'dashboard'
		);

		$this->load->view($this->layout, $data);
	}

	/**
	 * logout current user
	 * @return void
	 */
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('avatar');
		$this->session->unset_userdata('role');

		redirect();
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */