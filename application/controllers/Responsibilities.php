<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Responsibilities extends Front_end {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load_front_view("responsibilities");	
	}

}

/* End of file Responsibilities.php */
/* Location: ./application/controllers/Responsibilities.php */