<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statements_model extends MY_model {

	public $table = "statement";

	public function __construct()
	{
		parent::__construct();
	}

		public function getproperty()
    {
    $this->db->select('*');   
    $this->db->from('statement');
    $this->db->order_by('id', 'DESC');     
    $query = $this->db->get(); 
    if($query->num_rows() != 0)
    { 
    	return $query->result_array();;
    }
    else
    {
        return false;
    }
   }

}

/* End of file  */
/* Location: ./application/models/ */