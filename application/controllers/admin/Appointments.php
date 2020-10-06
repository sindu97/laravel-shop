<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointments extends Admin_C {

	public function __construct(){
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('Staff_model');
		$this->load->library('session');
        $this->load->helper("form");
	}

	public function index()	{	
 	 	$this->load->model("Appointment_model");
		
        $currentdate = date('Y-m-d');
        $data = $this->data["userdata"] = $this->Appointment_model->select_all(array(
            "where" => "appoinment_date >= '$currentdate'",

          ));
		$this->load_admin_view('appointment_view');

	}
	//--------------------------Deleteappointment--------------------//
    public function deleteappoint(){
        $this->load->model("Appointment_model");
       $id = $this->uri->segment(4);
        $where = "id = '$id'";
        $data = $this->data["userdata"] = $this->Appointment_model->select_all(array(
            "where" => "id = '$id'",

          ));
        foreach($data->result() as $val){
         $Atime = $val->appoinment_time;
        $Adate = $val->appoinment_date;
    }
    $delete = $this->data["userdata"] = $this->Appointment_model->delete_row($where);
        if($delete){
            $this->load->model("Disableslots_model");
            $where1 = "timeslot = '$Atime' && date_on = '$Adate' ";
            $delete1 = $this->data["userdata"] = $this->Disableslots_model->delete_row($where1);
                if($delete1){
             $this->session->set_flashdata('deletedsuccess', 'Appointment deleted successfully');   
            redirect('admin/Appointments');
           }else{
            $this->session->set_flashdata('deleteerror', 'Appointment not delted  successfully');   
            redirect('admin/Appointments');
           }
        }else{
             $this->session->set_flashdata('deleteerror', 'Appointment not delted  successfully');   
            redirect('admin/Appointments');
        }
}

//-------------Update Apointments--------------------------------

    public function updatestatus(){
         $this->load->model("Appointment_model");
        $id =$this->uri->segment(5);
        $status = $this->uri->segment(4);
       
        if($status == '1'){
         $data =array(
            'status'=> '0',
            );
         }else{
         $data =array(
            'status'=> '1',
            );  
         }    
             $where = "id = '$id'";

             $update= $this->Appointment_model->update_row(
                $where ,$data);
             if($update){
                redirect('admin/appointments');
             }else{
                echo"not";
                //redirect('admin/Addtimeslot/Allslots');
             }
    }
  //---------------getadd appoint data---------------
  public function Addapoint(){
     $this->load->model("Appointment_model");
     $this->load->model("Tenant_model");
     $data = $this->data["userdatateanant"] =   $this->Tenant_model->select_all();
     $this->load->model("Statements_model");
     $data = $this->data["userdata"] =   $this->Statements_model->select_all();
       $this->load->model("city_model");
       $this->data["usercity"] = $this->city_model->select_all();
     $this->load_admin_view('addappoint_view');

  }
  //----------------------------ajax-book-----------------------
 public function ajax_book(){   
        
        $this->load->model("Disableslots_model");
        $this->load->model("Timeslots_model");
        $date_id = $_POST['dateText'];
        $databook = $this->data["userdatabook"] =   $this->Disableslots_model->select_all(array(
            "where" => "date_on = '$date_id'",
          ));
        $disables = $databook->result();
        $data1 = $this->data["userdata1"] = $this->Timeslots_model->select_all(array(
            "where" => "status >= '1'",
          ));
        $allslots = $data1->result();

                   $allslots_arr=array();
                   foreach($allslots as $val){
                    $allslots = $val->timeslot;
                   array_push($allslots_arr,$allslots);
                  } 
                  $disableslots_arr=array();
                   foreach($disables as $val1){
                    $allslots = $val1->timeslot;
                   array_push($disableslots_arr,$allslots);
                  }
                  $result=array_diff($allslots_arr,$disableslots_arr);
                   if($result){
                  foreach($result as $dateavailable){
                    ?>
                    <option value="<?php echo $dateavailable;?>"><?php echo $dateavailable;?></option>
                <?php  }
            }else{ ?>
                    <option value="">No slot Available</option>
           <?php }


    }

     //---------------getadduser data---------------
  public function gettemailname(){
    $ten_id = $_POST['tenid'];
     $this->load->model("Tenant_model");
     $data = $this->data["userdata"] = $this->Tenant_model->select_all(array(
            "where" => "id = '$ten_id'",
          ));
     $fta = $data->result_array();
     echo json_encode($fta);
     /* foreach($data->result() as $val){  
         echo $val->tenant_email;
     }*/
  }

//--------------add appoint-----------------------------------
  public function addappointement(){
        $this->load->library('form_validation');
        $tenant_id =  $this->input->post('tenant_name');
        $this->load->model("Disableslots_model");
        $this->load->model("Appointment_model");
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email','Email', 'required|valid_email');
        $this->form_validation->set_rules('Phone', 'Phone', 'required|min_length[10]');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('available_time', 'Time', 'required');
        $this->form_validation->set_rules('property', 'property', 'required');
        $this->form_validation->set_rules('city', 'city ', 'required');
         if ($this->form_validation->run() == FALSE){
           
           $this->index();    
            }else{
             $msh = $_POST['addmore'];
             array_pop($msh); 
             foreach($msh as $problem){
           // $problem = implode(" ",$msh);
             $data =array(
            'name'=> $this->input->post('name'),
            'tenant_id' => $tenant_id,
            'phone'=> $this->input->post('Phone'),
            'email'=> $this->input->post('email'),    
            'appoinment_date'=> $this->input->post('date'),
            'appoinment_time'=> $this->input->post('available_time'),
            'city' =>  $this->input->post('city'),
            'property_name' => $this->input->post('property'),
            'message' => $problem,
            'status' => '1'
            );
            
              
             $insert= $this->Appointment_model->insert_row(
                $data); 
            }
            if($insert){
                $datadisable =array(    
            'date_on'=> $this->input->post('date'),
            'timeslot'=> $this->input->post('available_time'),
            'status' => '1'
            );
                $insertdis= $this->Disableslots_model->insert_row(
                $datadisable);
                if($insertdis){
                    $this->session->set_flashdata('insertdsuccess','Complaint registered Successfully');   
            redirect('admin/Appointments');
                }else{
                    $this->session->set_flashdata('inserteerror', 'Complaint not registered Successfully');   
            redirect('admin/Appointments');
                }
            }else{
                $this->session->set_flashdata('inserteerror','Complaint not registered Successfully');   
            redirect('admin/Appointments');
            }
        }
    }
//--------------------------Updateppointment--------------------//
    public function Editappointment(){
        $this->load->model("Appointment_model");
       $id = $this->uri->segment(4);
        $data = $this->data["edituserdata"] = $this->Appointment_model->select_all(array(
            "where" => "id = '$id'",
          ));
        $this->load_admin_view('editappoint_view');
}
//--------------------------Deleteappointment--------------------//
    public function update(){
        $this->load->model("Appointment_model");
    $this->load->library('form_validation');
     $id =  $this->input->post('hidid');
     $tenant_id =  $this->input->post('tenhidid');
        $this->load->model("Disableslots_model");
        $this->load->model("Appointment_model");
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email','Email', 'required|valid_email');
        $this->form_validation->set_rules('Phone', 'Phone', 'required|min_length[10]');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('available_time', 'Time', 'required');
        $this->form_validation->set_rules('property', 'property', 'required');
        $this->form_validation->set_rules('city', 'city ', 'required');
        if ($this->form_validation->run() == FALSE){
           
           $this->index();    
            }else{
             $msh = $_POST['addmore'];
            $problem = implode(" ",$msh);
             $data1 =array(
            'name'=> $this->input->post('name'),
            'tenant_id' => $tenant_id,
            'phone'=> $this->input->post('Phone'),
            'email'=> $this->input->post('email'),    
            'appoinment_date'=> $this->input->post('date'),
            'appoinment_time'=> $this->input->post('available_time'),
            'city' =>  $this->input->post('city'),
            'property_name' => $this->input->post('property'),
            'message' => $problem,
            'status' => '1'
            );
              $where = "id = '$id'";
        $data = $this->data["userdata"] = $this->Appointment_model->select_all(array(
            "where" => "id = '$id'",

          ));
                foreach($data->result() as $val){
                $Atime = $val->appoinment_time;
                $Adate = $val->appoinment_date;
            }
            $update = $this->Appointment_model->update_row($where,$data1);
        if($update){
             $this->load->model("Disableslots_model");
            $where1 = "timeslot = '$Atime' && date_on = '$Adate' ";
            $datadisl = array(   
            'date_on'=> $this->input->post('date'),
            'timeslot'=> $this->input->post('available_time'),
            'status' => '1'
            );
            $where1 = "timeslot = '$Atime' && date_on = '$Adate' ";
            $update1 = $this->Disableslots_model->update_row($where1,$datadisl);
                if($update1){
             $this->session->set_flashdata('upadtesuccess', 'Appointment Updated successfully');
             echo"ip";  
           redirect('admin/Appointments/');
           }else{
            $this->session->set_flashdata('updateerro', 'Appointment not updated successfully');   
            redirect('admin/Appointments/');
    }
    }
    
}
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */

?>