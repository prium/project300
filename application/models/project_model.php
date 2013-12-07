<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_model extends P300_model {

	public function __construct()
	{
		parent::__construct();
		$this->table = 'projects';
	}

	/**
	 * get list of status of projects
	 * @return array
	 */
	function getStatusList()
	{
		return array(
			'upcoming'			=> 'Upcoming',
			'working'			=> 'Working',
			'paused'			=> 'Paused',
			'unsuccessful'		=> 'Unsuccessful',
			'awaiting payment'	=> 'Awaiting payment',
			'completed'			=> 'Completed'
		);
	}

	/**
	 * adds a new project to database
	 * @return false/project last insert id
	 */
	function addNew()
	{
		$data = array(
			'name'			=>	$this->input->post('projectName'),
			'slug'			=>	$this->input->post('projectSlug'),
			'status'		=>	$this->input->post('projectStatus'),
			'startDate'		=>	$this->input->post('startDate'),
			'endDate'		=>	$this->input->post('endDate'),
			'description'	=>	($this->input->post('projectDescription') == '') ? NULL:$this->input->post('projectDescription'),
			'comment'		=>	($this->input->post('projectComment') == '') ? NULL:$this->input->post('projectComment')
		);

		if($this->db->insert($this->table, $data))
		{
			$projectId = $this->db->insert_id();

			$categoryIds = $this->input->post('categories');

			foreach($categoryIds as $categoryId)
			{
				$data1 = array (
					'projectId'		=>	$projectId,
					'categoryId'	=>	$categoryId
				);

				if(!$this->db->insert('projectCategories', $data1)) return false;
			}

			$clientIds = $this->input->post('clients');

			foreach($clientIds as $client)
			{
				$data2 = array (
					'projectId'		=>	$projectId,
					'clientId'		=>	$client
				);

				if(!$this->db->insert('projectClients', $data2)) return false;
			}
			return $projectId;
		}
		else return false;
	}

	/**
	 * find all projects
	 * @return array of objects
	 */
	function findAll()
	{
		$projects = $this->db
						->select('*')
						->from($this->table)
						->get()
						->result();
		foreach ($projects as $project)
		{
			$project->clients = $this->db
								->select('C.name')
								->where('PC.projectId', $project->id)
								->from('projectClients as PC')
								->join('clients as C', 'C.id = PC.clientId')
								->get()
								->result();
		}

		return $projects;
	}

	function findBySlug($slug)
	{
		$project =  $this->db
						->select('*')
						->where('slug', $slug)
						->get($this->table)
						->row();

		$project->clients = $this->db
								->select('C.name, C.gender, C.email, C.avatar, C.details, C.organization, C.address, C.startDate, C.endDate, C.comment, C.createdOn')
								->where('PC.projectId', $project->id)
								->from('projectClients as PC')
								->join('clients as C', 'C.id = PC.clientId')
								->get()
								->result();
		$project->categories = $this->db
								->select('Cat.name, ParCat.name as parentName')
								->where('PCat.projectId', $project->id)
								->from('projectCategories as PCat')
								->join('categories as Cat', 'Cat.id = PCat.categoryId')
								->join('categories as ParCat', 'ParCat.id = Cat.parent', 'left')
								->get()
								->result();
		$project->amounts = $this->db
								->select('amount, date, comment')
								->where('projectId', $project->id)
								->get('projectAmounts')
								->result();

		return $project;
	}


}

/* End of file project_model.php */
/* Location: ./application/models/project_model.php */