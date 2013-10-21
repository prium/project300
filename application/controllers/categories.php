<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends Stuff {

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
			'categoryType'	=>	'income'
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

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */