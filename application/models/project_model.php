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
	 * @return boolean
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

			$categoryIds = $this->input->post('category');

			foreach($categoryIds as $categoryId)
			{
				$data1 = array(
					'projectId'		=>	$projectId,
					'categoryId'	=>	$categoryId
				);

				if(!$this->db->insert('projectCategories', $data1)) return false;
			}
			return true;
		}
		else return false;
	}


}

/* End of file project_model.php */
/* Location: ./application/models/project_model.php */