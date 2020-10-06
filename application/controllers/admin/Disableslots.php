<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Disableslots extends Admin_C {

	public function __construct(){
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('Staff_model');
		$this->load->library('session');
        $this->load->helper("form");
	}

	public function index()	{	
 	    $this->load->model("Timeslots_model");
		$this->load->model("Disableslots_model");
        $currentdate = date('Y-m-d');
        $data = $this->data["userdata"] = $this->Timeslots_model->select_all(array(
            "where" => "status = '1'",
          ));
        $currentdate = date('Y-m-d');
        $this->data["userdatadiableslots"] = $this->Disableslots_model->select_all(array(
            "where" => "date_on >= '$currentdate' && status = 1 ",

          ));
		$this->load_admin_view('Disableslots_view');
    
       // $this->load_admin_view('Disableslots_view');
	}

//-------------------------updatedisabledata-----------------------------------------//
	public function updatedisabledata()	{	
 	     $this->load->library('form_validation');
        $this->load->model("Disableslots_model");
        $this->load->model("Timeslots_model");
        $this->form_validation->set_rules('all_time_slots', 'Time Slot', 'required');
        $this->form_validation->set_rules('date','Date', 'required');
        $allslot_array=array();
         if ($this->form_validation->run() == FALSE){
             $this->index();    
            }else{
            	$slotvalue = $this->input->post('all_time_slots');
            	if($slotvalue == 1){
            		$data = $this->data["userdata"] = $this->Timeslots_model->select_all(array(
			            "where" => "status = '1'",
			          ));
            		$allslots = $data->result();
            		foreach($allslots as $dataslot){
            			$varslot = $dataslot->timeslot;
            		    array_push($allslot_array, $varslot);
	            	    }
	            	foreach($allslot_array as $insertslot){
	            		$data= array(
	            		'date_on'=> $this->input->post('date'),
                        'timeslot' => $insertslot,
	            		);
	            		$insert= $this->Disableslots_model->insert_row(
                         $data);
	            	    }
                         if($insert){
                         	$this->session->set_flashdata('insertdsuccess','Slots Disabled Successfully');   
            				redirect('admin/Disableslots');
                         }else{
                         	$this->session->set_flashdata('inserteerror','Slots Not Disabled Successfull');   
                            redirect('admin/Disableslots');
                         } 
	           
            	}else{
            		$data= array(
	            		'date_on'=> $this->input->post('date'),
                        'timeslot' => $slotvalue,
	            		);
	            		$insert= $this->Disableslots_model->insert_row(
                         $data);
                         if($insert){
                         	$this->session->set_flashdata('insertdsuccess','Slots Disabled Successfully');   
            				redirect('admin/Disableslots');
                         }else{
                         	$this->session->set_flashdata('inserteerror','Slots Not Disabled Successfull');   
                            redirect('admin/Disableslots');
                         }
            	}
            }
	}


}	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */

?>