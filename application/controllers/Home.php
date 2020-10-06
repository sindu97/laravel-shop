<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Home page
*/
class Home extends Front_end
{
	
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load_front_view("home");		
	}

}