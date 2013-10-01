<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {


	function processLogin($username = null, $password = null)
	{
		$isLoggedIn =  $this->db
							->select('id, role')
							->where('username', $username)
							->where('password', do_hash($password, 'md5'))
							->get('users')
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