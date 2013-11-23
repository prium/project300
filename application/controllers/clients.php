<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends Stuff {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('client_model', 'client');
		
		# for making breadcrumbs
		$this->breadcrumbs->push('Home', site_url('dashboard'));
		$this->breadcrumbs->push('Clients', site_url('clients'));
	}

	/**
	 * Add new client index page
	 */
	public function addNew()
	{
		$this->breadcrumbs->push('Add New', site_url('clients/add-new'));
		$data = array
		(
			'pageTitle'		=>	'Add New Client',
			'pageLocation'	=>	'clients/add'
		);

		$this->load->view($this->layout, $data);
	}
	
	/**
	 * process a new project
	 * @return
	 */
	function processNew()
	{
		if($this->client->addNew())
			$this->session->set_flashdata('success', 'Client successfully addded');
		else
			$this->session->set_flashdata('error', 'Client could not be addded. Try again.');
		redirect('clients/add-new');
	}

}

/* End of file clients.php */
/* Location: ./application/controllers/clients.php */