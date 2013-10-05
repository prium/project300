<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends P300_model {
	
	public function __construct()
	{
		parent::__construct();
		$this->table = 'users';
	}


	function processLogin($username = null, $password = null)
	{
		$isLoggedIn =  $this->db
							->select('id, role')
							->where('username', $username)
							->where('password', do_hash($password, 'md5'))
							->get($this->table)
							->row();

		if($isLoggedIn)
		{
			$this->session->set_userdata('id', $isLoggedIn->id);
			$this->session->set_userdata('role', $isLoggedIn->role);

			return true;
		}
		return false;
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */