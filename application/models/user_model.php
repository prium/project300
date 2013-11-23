<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends P300_model {
	
	public function __construct()
	{
		parent::__construct();
		$this->table = 'users';
	}


	/**
	 * Login a user
	 * @param  string $username
	 * @param  string $password
	 * @return boolean
	 */
	function processLogin($username = null, $password = null)
	{
		$isLoggedIn =  $this->db
							->select('id, role, username')
							->where('username', $username)
							->where('password', do_hash($password, 'md5'))
							->get($this->table)
							->row();

		if($isLoggedIn)
		{
			$this->session->set_userdata('id', $isLoggedIn->id);
			$this->session->set_userdata('username', $isLoggedIn->username);
			$this->session->set_userdata('role', $isLoggedIn->role);

			return true;
		}
		return false;
	}

	/**
	 * find user info by username
	 * @param  string $username
	 * @return object
	 */
	function findByUsername($username)
	{
		return $this->db
					->select($this->table.'.*, UR.name AS role')
					->where($this->table.'.username', $username)
					->from($this->table)
					->join('userRoles as UR', $this->table.'.role = UR.id')
					->get()
					->row();
	}

	/**
	 * update personal info by username
	 * @param  string $username
	 * @return boolean
	 */
	function updatePersonal($username = null)
	{
		$data = array
		(
			'fullName'	=>	$this->input->post('fullName'),
			'email'		=>	$this->input->post('email')
		);

		return $this->db->where('username', $username)->update($this->table, $data);
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */