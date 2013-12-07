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
			'pageTitle'		=>	'View All Projects',
			'pageLocation'	=>	'projects/viewAll',
			'projects'		=>	$this->project->findAll()
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
		$this->load->model('client_model', 'client');

		$data = array
		(
			'pageTitle'		=>	'Add New Project',
			'pageLocation'	=>	'projects/add',
			'statusList'	=>	array('' => '-- select --') + $this->project->getStatusList(),
			'categoryList'	=>	$this->category->fullList('income'),
			'clientList'	=>	$this->client->allList(false)
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

	/**
	 * view a project
	 * @param  string $slug
	 * @return void
	 */
	function view($slug)
	{
		$project = $this->project->findBySlug($slug);
		print_r($project);

		$this->breadcrumbs->push($project->name, site_url('projects/'.$slug));
		
		$data = array
		(
			'pageTitle'		=>	'View Project',
			'pageLocation'	=>	'projects/viewOne',
			'project'		=>	$project
		);

		$this->load->view($this->layout, $data);
	}

}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */