<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_us page
*/
class Contact_us extends Front_end
{
	
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load_front_view("contact_us");		
	}

}