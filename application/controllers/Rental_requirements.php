<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rental_requirements extends Front_end {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load_front_view("rental_requirements");	
	}

}

/* End of file Rental_requirements.php */
/* Location: ./application/controllers/Rental_requirements.php */