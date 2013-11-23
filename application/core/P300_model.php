<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class P300_model extends CI_Model {

	protected $table;

	/**
	 * builds dropdown from array-of-object
	 * @param  array  $dropdownData
	 * @return array
	 */
	function buildDropdown($dropdownData = array())
	{
		$returnData = array();

		foreach ($dropdownData as $value)
		{
			$returnData[$value->id] = $value->name;
		}
		return array('' => 'None') + $returnData;
	}


	/**
	 * finds data by ID
	 * @param  int $id 
	 * @return object
	 */
	function findById($id)
	{
		return $this->db
					->where('id', $id)
					->get($this->table)
					->row();
	}

}

/* End of file P300_model.php */
/* Location: ./application/core/P300_model.php */