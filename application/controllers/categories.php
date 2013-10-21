<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends Stuff {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model', 'category');
	}

	/**
	 * income page of categories
	 * @return void
	 */
	public function income()
	{
		$data = array
		(
			'pageTitle'		=>	'Income Categories',
			'pageLocation'	=>	'categories/categories',
			'categoryType'	=>	'income',
			'categories'	=>	$this->category->incomeParent()
		);

		$this->load->view($this->layout, $data);	
	}

	/**
	 * expense page of categories
	 * @return void
	 */
	public function expense()
	{
		$data = array
		(
			'pageTitle'		=>	'Expense Categories',
			'pageLocation'	=>	'categories/categories',
			'categoryType'	=>	'expense'
		);

		$this->load->view($this->layout, $data);	
	}

	public function processNew()
	{
		if($this->category->addNew())
		{
			$this->session->set_flashdata('success', 'Category successfully addded');
		}
		else
		{
			$this->session->set_flashdata('error', 'Category could not be addded. Try again.');
		}
		redirect('categories/'.$this->input->post('categoryType'));
	}

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */