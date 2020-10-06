<?php 
/**
 * admin model
 */
class Staff_model extends MY_Model
{	
	function __construct()
	{
		parent::__construct();
		$per_tble = 'staff_permissions';
		$this->table = 'staff';
		 $this->load->database(); 
	}


    function user_id(){
		if($this->is_logged_in()){
			return $this->session->userdata("user_login")->id;
		}
		return false;
	}

	function is_logged_in(){
		if($this->session->has_userdata('user_login')){
			return true;
		}
		return false;
	}

	function user_can($per){
		// $user = $this->session->userdata("user_login");
		// $permissions = explode(",",$user->permissions);
		// $all_per = $this->db->get($this->per_tble) ;
		// if($all_per->num_rows()){
		// 	$allP = $all_per->result ;
		// }
		// return false;
	}

	function username_exist($var){
		$res = $this->select_all(array(
			"where" => array('username', $var)
		));
		if($res->row()){
			return true ;
		}else{
			return false;
		}
	}
   function insert($tbl,$data)
	{
		
		$res=$this->db->insert_batch('statement', $data);
		//$insert_id = $this->db->insert_id();
		if($res>0)
		{
			return 1;
		}else{
			return 0;
		}	
	}

	 function getusersdata()
	{
		$query=$this->db->query("SELECT DISTINCT loginid FROM statement");
		$ar=$query->result_array();
		$len=count($ar);
		if($len>0)
		{
			return $ar;
		}else{
			return 0;
		}	
	}
}