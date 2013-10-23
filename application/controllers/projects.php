<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends Auth {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('project_model', 'project');

		# for making breadcrumbs
		$this->breadcrumbs->push('Home', site_url('dashboard'));
		$this->breadcrumbs->push('Projects', site_url('projects'));
	}

	/**
	 * view all projects
	 */
	public function index()
	{
		$data = array
		(
			'pageTitle'		=>	'View All Project',
			'pageLocation'	=>	'projects/viewAll'
		);

		$this->load->view($this->layout, $data);
	}

	/**
	 * Add a new project
	 */
	public function addNew()
	{
		$this->breadcrumbs->push('Add Project', site_url('projects/add-new'));
		$this->load->model('category_model', 'category');

		$data = array
		(
			'pageTitle'		=>	'Add New Project',
			'pageLocation'	=>	'projects/add',
			'statusList'	=>	array('' => '-- select --') + $this->project->getStatusList(),
			'categoryList'	=>	$this->category->fullList('income')
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