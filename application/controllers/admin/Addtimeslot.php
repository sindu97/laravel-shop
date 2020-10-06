<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addtimeslot extends Admin_C {

    public function __construct(){
        parent::__construct();
        $this->load->library('excel');
        $this->load->model('Statements_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() {   
        $this->load_admin_view('Addslot_view');

    }
//-----------------------add time slot data-----------------------
    public function timeslotdata(){ 
     $starttime = $this->input->post('start_time');
     $endtime = $this->input->post('end_time');
     $timeslot = "$starttime"."$endtime";
        $this->load->model("Timeslots_model"); 
             $data =array(
            'timeslot' => $timeslot,    
            'starttime'=> $this->input->post('start_time'),
            'endtime' =>$this->input->post('end_time'),
            'status' => '1',
            'dlete_id'=>'0'
            );
             $insert= $this->Timeslots_model->insert_row(
                $data); 
             if($insert){
            $this->session->set_flashdata('insertdsuccess', 'Time slot created successfully');   
            redirect('admin/Addtimeslot/Allslots');
             }else{
            $this->session->set_flashdata('inserteerror', 'Time slot not created successfully');   
            redirect('admin/Addtimeslot/Allslots');
             }

    }


//-------------All slots--------------------------------

    public function Allslots(){
         $this->load->model("Timeslots_model"); 
         $data = $this->data["userdata"] =   $this->Timeslots_model->select_all();
         $this->load_admin_view('allslot_view');

    }
//-------------Update All slots--------------------------------

    public function updatestatus(){
         $this->load->model("Timeslots_model");
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

             $update= $this->Timeslots_model->update_row(
                $where ,$data);
             if($update){
                 $this->load->model("Disableslots_model");
                $update= $this->Disableslots_model->update_row(
                $where ,$data);
                redirect('admin/Addtimeslot/Allslots');
             }else{
                redirect('admin/Addtimeslot/Allslots');
                //redirect('admin/Addtimeslot/Allslots');
             }
    }
//--------------------------show all timeslot--------------------//
    public function Bookedslot(){
         $this->load->model("Disableslots_model");
         $currentdate = date('Y-m-d');
          $data = $this->data["userdata"] =   $this->Disableslots_model->select_all(array(
            "where" => "date_on >= '$currentdate' and status = '1'",

          ));
      $this->load_admin_view('booked_view');

    }
    //--------------------------Delete timeslot--------------------//
    public function deleteslot(){
        $this->load->model("Timeslots_model");
       $id = $this->uri->segment(4);
        $where = "id = '$id'";
        $delete = $this->data["userdata"] = $this->Timeslots_model->delete_row($where);
        if($delete){
             $this->session->set_flashdata('deletedsuccess', 'Time slot deleted successfully');   
            redirect('admin/Addtimeslot/Allslots');
        }else{
             $this->session->set_flashdata('deleteerror', 'Time slot  not delted  successfully');   
            redirect('admin/Addtimeslot/Allslots');
        }

    }
    //--------------------------Edit timeslot--------------------//
    public function editslot(){
        $this->load->model("Disableslots_model");
        $this->load->model("Timeslots_model");
        $id = $this->uri->segment(4);
        $data = $this->data["userdatacurrent"] =   $this->Disableslots_model->select_all(array(
            "where" => "id = '$id'",

          ));
        $fordata = $data->result();
       foreach($fordata as $val){
       $date_id = $val->date_on;
        $databook = $this->data["userdatabook"] =   $this->Disableslots_model->select_all(array(
            "where" => "date_on = '$date_id'",

          ));
    }
       $data1 = $this->data["userdata1"] = $this->Timeslots_model->select_all(array(
            "where" => "status >= '1'",
          ));
          $this->load->model("Disableslots_model");
           $currentdate = date('Y-m-d');
          $data = $this->data["userdata"] =   $this->Disableslots_model->select_all(array(
            "where" => "date_on >= '$currentdate'",

          ));
        $this->load_admin_view('editslot_view');

    }

    //--------------------------Update timeslot--------------------//
    public function updatetimeslot(){       
        $this->load->model("Disableslots_model");
        $this->load->model("Timeslots_model");
    if($_POST) {   
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('time_slot', 'Time Slot ', 'required');
        if ($this->form_validation->run() == FALSE){
            //echo form_error('username');
              $this->index();   
            }else{
             $data =array(
            'date_on'=> $this->input->post('date'),
            'timeslot' =>$this->input->post('time_slot')
            );
             $whereid = $this->input->post('hiddenid');
             $where = "id = '$whereid'";

             $update= $this->Disableslots_model->update_row(
                $where ,$data);  
             if($update){
                 $this->load->model("Appointment_model");
                $wdate = $this->input->post('date');
                $wtime = $this->input->post('time_slot');
                 $data1 =array(
                    'appoinment_date'=> $this->input->post('date'),
                    'appoinment_time' =>$this->input->post('time_slot')
                    );
                $where = "appoinment_date = '$wdate' and appoinment_time = '$wtime'";
                 $updateapooint= $this->Appointment_model->update_row(
                $where ,$data1);

                 if($updateapooint){
                    echo"updated";
                 }else{
                    echo"not";
                 }

                


            $this->session->set_flashdata('updatesuccess', 'Booked slot updated successfully');   
                 redirect('admin/Addtimeslot/Bookedslot');
             }else{ 
            $this->session->set_flashdata('updateerror', 'Booked slot not updated successfully');   
           redirect('admin/Addtimeslot/Bookedslot');
             }
           
            }    

    }else{   
    redirect('admin/Addtimeslot/Bookedslot');
    }

    }
//--------------------------Delete bookedslot--------------------//
    public function deletebookedslot(){
        $this->load->model("Disableslots_model");
       $id = $this->uri->segment(4);
        $where = "id = '$id'";
        $delete = $this->data["userdata"] = $this->Disableslots_model->delete_row($where);
        if($delete){
             $this->session->set_flashdata('deletedsuccess', 'slot deleted successfully');   
            redirect('admin/Addtimeslot/Bookedslot');
        }else{
             $this->session->set_flashdata('deleteerror', 'slot  not delted  successfully');   
            redirect('admin/Addtimeslot/Bookedslot');
        }

    }
}

?>