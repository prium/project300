<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends Auth {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('project_model', 'project');
	}

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
			'pageLocation'	=>	'projects/add',
			'categories'	=>	array('' => '-- select --') + $this->project->getCategories()
		);

		$this->load->view($this->layout, $data);
	}

	/**
	 * process a new project
	 * @return
	 */
	function processNew()
	{
		if($this->project->addNew())
			echo "Success";
		else
			echo "Error";
	}

}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */