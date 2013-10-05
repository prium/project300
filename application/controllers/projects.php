<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends Auth {

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		// will be all projects
	}

	/**
	 * Add a new project
	 */
	public function addNew()
	{
		$data = array
		(
			'pageTitle'		=>	'Add New Project',
			'pageLocation'	=>	'projects/add'
		);

		$this->load->view($this->layout, $data);
	}

}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */