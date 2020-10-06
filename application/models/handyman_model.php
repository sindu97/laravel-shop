<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handyman_model extends MY_model {

	public $table = "handyamn";

	public function __construct()
	{
		parent::__construct();
	}


	//--------------owner  login check-----------------//
	function logincheck($username,$password)
	{
		$query=$this->db->query("select * from handyamn where user='$username' and password='$password' and status= 1");
		$ar= $query->row();
		if($ar)
		{
			return $ar;
		}else{
			return 0;	
		} 
	}

}

/* End of file  */
/* Location: ./application/models/ */