<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Base Controller
 */
class P300_controller extends CI_Controller {

	public $layout = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->layout = "layouts/master";
	}
}

/**
 * User Privilages Controllers
 */
class Guest extends P300_controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('id')) redirect('dashboard');
	}
}

class Auth extends P300_controller {
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id')) redirect();
	}
}

class Stuff extends Auth {
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('role') > 2) redirect('dashboard');
	}
}

class Admin extends Stuff {
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('role') != 1) redirect('dashboard');
	}
}



/* End of file P300_controller.php */
/* Location: ./application/core/P300_controller.php */