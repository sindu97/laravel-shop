<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends handyman_C {

	public function __construct(){
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('Staff_model');
		$this->load->library('session');
		  $this->load->library('form_validation');
	}

	public function index()	{	
	     $this->load->model("Appointment_model");
       $user = $this->session->userdata('admin_handyman_login');
       $tenid = $user->city;
        $data1 = $this->data["userdata"] = $this->Appointment_model->select_all(array(
            "where" => "city = '$tenid'",
          ));
        $this->load->model("City_model");
       $this->data["usercity"] = $this->City_model->select_all();
        $this->load_handyman_view('index');
    }
//---------------------------request estimate------------------//
   public function requestestimate()	{
   $this->load->model("Appointment_model");	
	   $appointmentid = $this->uri->segment('4');
	   $data1 = $this->data["userdata"] = $this->Appointment_model->select_all(array(
            "where" => "id = '$appointmentid'",
          ));
   
     $appdate = $data1->result()[0]-> appoinment_date;
     $apptime = $data1->result()[0]-> appoinment_time;
     $data = $this->data["Fulldata"] = $this->Appointment_model->select_all(array(
            "where" => "appoinment_date = '$appdate' && appoinment_time = '$apptime'",
          ));
    /*  echo"<pre>";
     print_r($data->result());
     die();*/
	   $this->load_handyman_view('estimaterequest_view');
    } 
  //------------  addestimaterequst --------------------------//
    public function addestimaterequst()	{
       $this->load->model('Estimate_repair_model');
      $user = $this->session->userdata('admin_handyman_login');
      $handyman_id = $user->id;
      $appoint_id = $this->input->post('hiiddenappoint');
      $checkrequest = $this->data["userdata1"] = $this->Estimate_repair_model->select_all(array(
            "where" => "appoint_id = '$appoint_id'",
          ));
     $checkrequest1 = $checkrequest->result();
      if(empty($checkrequest1)){
      $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == FALSE){
             echo"error";

            //$this->index();
            }else{
      $All_problems = $_POST['problem'];
      $problems_id = $_POST['hid'];
      $cost_problems = $_POST['Cost'];
      $Itemsneeded = $_POST['Items'];
      $Problems_array =array(
          "problems" => $All_problems, 
          "problemids"=> $problems_id,
          "costproblems"=> $cost_problems,
          "Itemsneeded"=> $Itemsneeded
      );
      $numFields = count($All_problems);
      for ($i = 0; $i < $numFields; $i++) {
    $data = array(
        'handyman_id'=> $handyman_id,
        'property_name'=> $this->input->post('property'),
        'tenant_id' => $this->input->post('hiiddentenant'),
        'estimated_cost' => $Problems_array['costproblems'][$i],
        'prerequites_message' => $Problems_array['Itemsneeded'][$i],
        'appoint_id' => $Problems_array['problemids'][$i],
        'approve' =>  '0',
        'delete_id' => '0',
        'status' => '1'
         );
            $insert= $this->Estimate_repair_model->insert_row(
                $data); 
          }
             if($insert){
              $this->session->set_flashdata('estimatesend', 'Estimated send successfully'); 
            redirect('handyman/Dashboard/Allestimates');
             }else{
              $this->session->set_flashdata('estimaterror', 'Estimated Not send successfully'); 
            redirect('handyman/Dashboard/Allestimates');
                    }
                }
            }else{
              $this->session->set_flashdata('estimatealready', 'Estimated Already Given For This Complaint'); 
            redirect('handyman/');

            }
    }


      /*die();
   	   $this->load->model('Estimate_repair_model');
      $user = $this->session->userdata('admin_handyman_login');
 	    $handyman_id = $user->id;
 	    $appoint_id = $this->input->post('hiiddenappoint');
 	    $checkrequest = $this->data["userdata1"] = $this->Estimate_repair_model->select_all(array(
            "where" => "appoint_id = '$appoint_id'",
          ));
     $checkrequest1 = $checkrequest->result();
 	    if(empty($checkrequest1)){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('Cost','Cost', 'required');
        if ($this->form_validation->run() == FALSE){
             echo"error";

            //$this->index();
            }else{
            $data =array(
            'handyman_id'=> $handyman_id,
            'tenant_id' => $this->input->post('hiiddentenant'),
            'appoint_id' => $this->input->post('hiiddenappoint'),
            'estimated_cost'=> $this->input->post('Cost'),
           'prerequites_message'=> $this->input->post('Items'),    
            'property_name'=> $this->input->post('property'),
            'approve' =>  '0',
            'delete_id' => '0',
            'status' => '1'
            );
             $insert= $this->Estimate_repair_model->insert_row(
                $data); 
             if($insert){
             	$this->session->set_flashdata('estimatesend', 'Estimated send successfully'); 
				    redirect('handyman/Dashboard/Allestimates');
             }else{
             	$this->session->set_flashdata('estimaterror', 'Estimated Not send successfully'); 
				    redirect('handyman/Dashboard/Allestimates');
                    }
                }
            }else{
            	$this->session->set_flashdata('estimatealready', 'Estimated Already Given For This Complaint'); 
				    redirect('handyman/');

            }
    }*/
    //-------------------All estimate------------------//
   public function Allestimates(){
   $this->load->model("Estimate_repair_model");
    $data =$this->data["userhany"]=$this->Estimate_repair_model->getall_estimates();
    $this->load_handyman_view('Allestimate_view');
    }
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */

