<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends Auth {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('project_model', 'project');

		$this->breadcrumbs->push('Home', site_url('dashboard'));
		$this->breadcrumbs->push('Projects', site_url('projects'));
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
		$this->breadcrumbs->push('Add Project', site_url('projects/add-new'));

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
		{
			$this->session->set_flashdata('success', 'Project successfully addded');
		}
		else
		{
			$this->session->set_flashdata('error', 'Project could not be addded. Try again.');
		}
		redirect('projects/add-new');
	}

}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */