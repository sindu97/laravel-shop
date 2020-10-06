<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Home page
*/
class Test  extends CI_Controller{

	
	function __construct(){
		parent::__construct();
		 
		 
	}
	
    public function data(){
    	$existing_array = [];
         $disable_array = [];
    	$this->load->model("Appointment_model");
         	 $data = $this->data["userdata"] =   $this->Appointment_model->select_all(array(
         	 	"select" => "appoinment_time",
		  	     "where" => "appoinment_date = '2020-03-26'"
		  ));
         	 $username1 = $data->result_array() ;
         	 //foreach($username1)
         	 //

         	foreach($username1 as $val){
         	 	array_push($existing_array,$val['appoinment_time']);
         	 }                                                       echo json_encode($existing_array);
             $this->load->model("Disableslots_model");
              $disableslot = $this->data["userdata"] =   $this->Disableslots_model->select_all(array(
                 "where" => "date_on = '2020-03-26'"
          ));
         	$username = $disableslot->result_array() ; 
            foreach($username as $val){
                array_push($disable_array,$val['timeslot']);
             }
             echo json_encode($disable_array);
    }









	public function index(){

		$existing_array = [];
        $disable_array = [];
        if(isset($_GET['dateText']) && $_GET['dateText']!="")
         {	
         	$username = $_GET['dateText'];
         	 $data = $this->data["userdata"] =   $this->Appointment_model->select_all(array(
		  	     "where" => "appoinment_date = '$username'"
		  ));
         	 $disableslot = $this->data["userdata"] =   $this->Disableslots_model->select_all(array(
		  	     "where" => "date_on = '$username'"
		  ));
         	 echo"<pre>";
         	 print_r($disableslot->result());
         
         }
	}

}