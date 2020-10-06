<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Online_portal extends Front_end {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load_front_view("online_portal");	
	}

}

/* End of file Online_portal.php */
/* Location: ./application/controllers/Online_portal.php */