<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tenant_model extends MY_model {

	public $table = "tenants";

	public function __construct()
	{
		parent::__construct();
	}


	//--------------owner  login check-----------------//
	function logincheck($username,$password)
	{
		$query=$this->db->query("select * from tenants where user='$username' and password='$password' and status= 1");
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