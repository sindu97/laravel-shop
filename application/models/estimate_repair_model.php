<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estimate_repair_model extends MY_model {

	public $table = "estimate_repair";

	public function __construct()
	{
		parent::__construct();
	}
public function eget()
{
    $this->db->select('*');
    $this->db->from('estimate_repair a'); 
    $this->db->join('appoinments b', 'b.id=a.appoint_id', 'left');
   // $this->db->where('c.album_id',$id);
   // $this->db->order_by('c.track_title','asc');         
    $query = $this->db->get(); 
    if($query->num_rows() != 0)
    { 
    	return $query->result();;
    }
    else
    {
        return false;
    }
}
//---------------------------to get all estimates for admin-------------------->
public function getall_estimates()
{
    $query1=$this->db->query("select * from estimate_repair");
        $ar1= $query1->row();
        if($query1->num_rows() != 0)
    {

    $this->db->select('*','estimate_repair.id');
    $this->db->from('estimate_repair a'); 
    $this->db->join('appoinments b', 'b.id=a.appoint_id');
    $this->db->join('handyamn c', 'c.id=a.handyman_id', 'Right');
   // $this->db->where('c.album_id',$id);
   // $this->db->order_by('c.track_title','asc');         
    $query = $this->db->get(); 
    if($query->num_rows() != 0)
    { 
        return $query->result();;
    }
    else
    {
        return false;
         }
    }
}

}

/* End of file  */
/* Location: ./application/models/ */