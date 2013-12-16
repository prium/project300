<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends P300_model {

	function __construct()
	{
		$this->table = 'categories';
	}

	/**
	 * returns parent categories by type
	 * @param  string  $type          income/expense
	 * @param  boolean $buildDropdown
	 * @return array
	 */
	function parentList($type = null, $buildDropdown = true)
	{
		$categories = $this->db
						->select('id, name')
						->where('type', $type)
						->where('parent', null)
						->get($this->table)
						->result();
		if($buildDropdown) return $this->buildDropdown($categories);
		else return $categories;
	}

	/**
	 * returns full list of category by type
	 * @param  string $type income/expense
	 * @return array
	 */
	function fullList($type = null)
	{
		$categoryList = $this->db
							->select('id, name')
							->where('type', $type)
							->where('parent', null)
							->get('categories')
							->result();
		foreach ($categoryList as $key => $category)
		{
			$category->subCategory = $this->db
										->select('id, name')
										->where('parent', $category->id)
										->get('categories')
										->result();
		}

		return $categoryList;
	}

	/**
	 * add a new category
	 */
	function addNew()
	{
		$data = array
		(
			'name'	=>	$this->input->post('categoryName'),
			'slug'	=>	$this->input->post('categorySlug'),
			'type'	=>	$this->input->post('categoryType'),
			'parent'=>	($this->input->post('categoryParent') == 0) ? null : $this->input->post('categoryParent')
		);

		return $this->db->insert($this->table, $data);
	}

	/**
	 * category ids by a project
	 * @param  int  $projectId
	 * @param  boolean $asArray
	 * @return array/object
	 */
	function categoryIDs($projectId, $asArray = true)
	{
		$categoryIds = $this->db
						->select('categoryId')
						->where('projectId', $projectId)
						->get('projectCategories')
						->result();

		if($asArray)
		{
			$categoryIdsArray = array();
			foreach ($categoryIds as $categiryIdObj)
			{
				$categoryIdsArray[] = $categiryIdObj->categoryId;
			}
			return $categoryIdsArray;
		}
		else return $categoryIds;
	}

}

/* End of file categories_model.php */
/* Location: ./application/models/categories_model.php */