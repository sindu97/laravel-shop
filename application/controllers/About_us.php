<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* About_us page
*/
class About_us extends Front_end
{
	
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load_front_view("about");		
	}

}