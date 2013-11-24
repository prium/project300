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
							->select('id, role, username, avatar')
							->where('username', $username)
							->where('password', do_hash($password, 'md5'))
							->get($this->table)
							->row();

		if($isLoggedIn)
		{
			$this->session->set_userdata('id', $isLoggedIn->id);
			$this->session->set_userdata('username', $isLoggedIn->username);
			$this->session->set_userdata('avatar', $isLoggedIn->avatar);
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

	function updateAvatar($username = null)
	{
		$config = array
		(
			'upload_path' 	=> 'uploads/',
			'allowed_types' => 'jpg|png',
			'encrypt_name'	=>	true
		);

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('avatar'))
		{
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect('profile/'.$username);
		}
		else
		{
			$avatar = $this->upload->data();
			$this->load->library('image_lib');

			$this->session->set_userdata('avatar', $avatar['file_name']);

			$config2 = array
			(
				'image_library' 	=> 'gd2',
				'source_image'		=> 'uploads/'.$avatar['file_name'],
				'new_image'			=> 'uploads/thumbnails/',
				'create_thumb' 		=> TRUE,
				'maintain_ratio' 	=> TRUE,
				'width'	 			=> 100,
				'height'			=> 20,
				'thumb_marker'		=> ''
			);

			$this->image_lib->initialize($config2);

			if($this->image_lib->resize())
			{
				// sava data in DB
				$this->db
					->where('username', $username)
					->update($this->table, array('avatar' => $avatar['file_name']));

				$this->session->set_flashdata('success', 'Avatar uploaded successfully.');
				redirect('profile/'.$username);
			}
			else
			{
				$this->session->set_flashdata('error', 'Some error occured. Try again.');
				redirect('profile/'.$username);	
			}
			
		}
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */