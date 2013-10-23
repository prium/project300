<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends Stuff {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model', 'category');

		# for making breadcrumbs
		$this->breadcrumbs->push('Home', site_url('dashboard'));
		$this->breadcrumbs->push('Projects', site_url('projects'));
		$this->breadcrumbs->push('Categories', site_url('categories'));
	}

	/**
	 * redirect to project
	 * @return void
	 */
	function index()
	{
		$this->project();
	}

	/**
	 * redirect to project
	 * @return void
	 */
	function income()
	{
		redirect('categories/project');
	}

	/**
	 * income page of categories
	 * @return void
	 */
	public function project()
	{
		$data = array
		(
			'pageTitle'		=>	'Project Categories',
			'pageLocation'	=>	'categories/categories',
			'categoryType'	=>	'income',
			'categories'	=>	$this->category->parentList('income')
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
		if($this->input->post('categoryType') == 'income') redirect('categories/project');

		redirect('categories/'.$this->input->post('categoryType'));
	}

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */