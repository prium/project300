<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Auth {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'user');

		# for making breadcrumbs
		$this->breadcrumbs->push('Home', site_url('dashboard'));
	}

	/**
	 * Loads default dashboard
	 * @return void
	 */
	
	public function index($username = null)
	{
		$this->view($username);
	}

	public function view($username = null)
	{
		if(is_null($username)) show_404();

		$this->breadcrumbs->push('Profile', site_url('profile/'.$username));

		$data = array
		(
			'pageTitle'		=>	'Profile',
			'pageLocation'	=>	'profile/index',
			'user'			=>	$this->user->findByUsername($username)
		);

		$this->load->view($this->layout, $data);
	}

	function updatePersonal($username = null)
	{
		if($this->user->updatePersonal($username))
			$this->session->set_flashdata('success', 'Profile Information has updated successfully.');
		else
			$this->session->set_flashdata('error', 'Profile Information could not be updated. Try again.');
		redirect('profile/'.$username);
	}

	function updateAvatar($username = null)
	{
		if($this->user->updateAvatar($username))
			$this->session->set_flashdata('success', 'Avatar uploaded successfully.');
		else
			$this->session->set_flashdata('error', 'Some error occured. Try again.');
		
		redirect('profile/'.$username);	
	}

	public function updatePassword($username = null)
	{
		$this->form_validation->set_rules('oldPassword', 'Old Password', 'trim|required|callback__matchPassword['.$username.']');
		$this->form_validation->set_rules('newPassword', 'New Password', '
			trim|required');
		$this->form_validation->set_rules('conNewPassword', 'Confirm New Password', '
			trim|required|matches[newPassword]');

		if($this->form_validation->run() == FALSE)
    	{
    		$this->index($username);
    	}
    	else
    	{
			if($this->user->updatePassword($username))
				$this->session->set_flashdata('success', 'Password has updated! Use the new password to login next time.');
			else
				$this->session->set_flashdata('error', 'Password could not be updated. Try again.');
			
			redirect('profile/'.$username);
		}
	}

	public function _matchPassword($oldPassword, $username)
	{
		$user =	$this->user->findByUsername($username);

		$this->form_validation->set_message('_matchPassword', 'Old Password did not match.');

		if($user->password == do_hash($this->input->post('oldPassword'), 'md5')) return TRUE;
		else return FALSE;
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */