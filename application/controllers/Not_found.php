<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Not_found page
 */
class Not_found extends Front_end
{
	
	function __construct()		
	{
		parent::__construct();
	}

	public function index(){
		$this->load_front_view("not-found");
	}

}