<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends P300_model {

	function incomeParent()
	{
		$categories = $this->db
						->select('id, name')
						->where('type', 'income')
						->get('categories')
						->result();

		return $this->buildDropdown($categories);
	}

	function addNew()
	{
		$data = array
		(
			'name'	=>	$this->input->post('categoryName'),
			'slug'	=>	$this->input->post('categorySlug'),
			'type'	=>	$this->input->post('categoryType'),
			'parent'=>	($this->input->post('categoryParent') == 0) ? null : $this->input->post('categoryParent')
		);

		return $this->db->insert('categories', $data);
	}

}

/* End of file categories_model.php */
/* Location: ./application/models/categories_model.php */