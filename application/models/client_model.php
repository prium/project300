<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends P300_model {
	
	function __construct()
	{
		$this->table = 'clients';
	}

	/**
	 * returns list of all clients
	 * @param  boolean $buildDropdown
	 * @return array
	 */
	function allList($buildDropdown = true)
	{
		$clients = $this->db
						->select('id, name')
						->get($this->table)
						->result();
		if($buildDropdown) return $this->buildDropdown($clients);
		else return $clients;
	}
	
	/**
	 * add a new client
	 * @return false/last insert id
	 */
	function addNew()
	{
		$data = array
		(
			'name'			=>	$this->input->post('clientName'),
			'email'			=>	$this->input->post('clientEmail'),
			'gender'		=>	$this->input->post('clientGender'),
			'startDate'		=>	$this->input->post('startDate'),
			'endDate'		=>	($this->input->post('endDate') == '') ? null : $this->input->post('endDate'),
			'organization'	=>	($this->input->post('clientOrg') == '') ? null : $this->input->post('clientOrg'),
			'address'		=>	($this->input->post('clientAddress') == '') ? null : $this->input->post('clientAddress'),
			'details'		=>	($this->input->post('clientDetails') == '') ? null : $this->input->post('clientDetails'),
			'comment'		=>	($this->input->post('clientComment') == '') ? null : $this->input->post('clientComment')
		);

		if($this->db->insert($this->table, $data))
			return $this->db->insert_id();
		else return false;
	}

	/**
	 * client ids by a project
	 * @param  int  $projectId
	 * @param  boolean $asArray
	 * @return array/object
	 */
	function clientIDs($projectId, $asArray = true)
	{
		$clientIds = $this->db
						->select('clientId')
						->where('projectId', $projectId)
						->get('projectClients')
						->result();

		if($asArray)
		{
			$clientIdsArray = array();
			foreach ($clientIds as $clientIdObj)
			{
				$clientIdsArray[] = $clientIdObj->clientId;
			}
			return $clientIdsArray;
		}
		else return $clientIds;
	}
}

/* End of file client_model.php */
/* Location: ./application/controllers/client_model.php */