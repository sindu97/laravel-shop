<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Maintaining your rental property page
*/
class Maintaining_your_rental_property extends Front_end
{
	
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load_front_view("maintaining_your_rental_property");		
	}

}