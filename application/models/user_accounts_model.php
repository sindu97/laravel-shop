<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_accounts_model extends MY_model {

	public $table = "user_accounts";

	public function __construct()
	{
		parent::__construct();
	}

//--------------owner  login check-----------------//
	function logincheck($username,$password)
	{
		$query=$this->db->query("select * from user_accounts where username='$username' and password	='$password' ");
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