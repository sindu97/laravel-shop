<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends tenant_C {

	public function __construct(){
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('Staff_model');
		$this->load->library('session');
		  $this->load->library('form_validation');
	}

	public function index()	{	
		$user = $this->session->userdata('admin_Tenant_login');
 	     $username = $user->user;
       $this->load->model("City_model");
       $this->data["usercity"] = $this->City_model->select_all();
       $this->load_tenant_view('index');

	}

	public function ajax_book()	{	
		
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
                <?php }
                 }else{ ?>
                  <option value="">No Slot Available</option>
           <?php     }


	}
	public function addappointement(){
		$user = $this->session->userdata('admin_Tenant_login');
 	    $tenant_id = $user->id;
		$this->load->model("Disableslots_model");
        $this->load->model("Appointment_model");
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email','Email', 'required|valid_email');
        $this->form_validation->set_rules('Phone', 'Phone', 'required|min_length[10]');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('available_time', 'Time', 'required');
        $this->form_validation->set_rules('city', 'city ', 'required');
		 if ($this->form_validation->run() == FALSE){
          echo"error"; 
            }else{
			 $msh = $_POST['addmore'];
			$problem = implode(" ",$msh);
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
            redirect('tenant/');
                }else{
                	$this->session->set_flashdata('inserteerror', 'Complaint not registered Successfully');   
            redirect('tenant/');
                }
            }else{
            	$this->session->set_flashdata('inserteerror','Complaint not registered Successfully');   
            redirect('tenant/');
            }
        }
	}
//----------------------all tenant-------------------------
 public function Alltenant() {   
        $this->load->model("Appointment_model");
       $user = $this->session->userdata('admin_Tenant_login');
       $tenid = $user->id;
        $data1 = $this->data["userdata"] = $this->Appointment_model->select_all(array(
            "where" => "tenant_id = $tenid",
          ));
        $this->load_tenant_view('alltenant_view');
    }
} 	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */

?>