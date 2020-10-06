<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addcity extends Admin_C {

    public function __construct(){
        parent::__construct();
        $this->load->library('excel');
        $this->load->model('statements_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() { 
     $this->load->model("City_model");
    $this->data["userdata"] =   $this->City_model->select_all();  
        $this->load_admin_view('addcity_view');

    }
//-----------------------add tcity-----------------------
    public function addcitydata(){ 
        $this->load->model("City_model");
        $this->form_validation->set_rules('city', 'city', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->index();
            }else{
            $data =array(
            'cit_name'=> $this->input->post('city')
            );
             
             $insert= $this->City_model->insert_row(
                $data); 
             if($insert){
            $this->session->set_flashdata('insertdsuccess', 'Business City created successfully');   
            redirect('admin/addcity');
             }else{
            $this->session->set_flashdata('inserteerror', 'Business City not created successfully');   
            redirect('admin/addcity');
             }

    }
}




    //--------------------------Delete timeslot--------------------//
    public function deleteslot(){
        $this->load->model("City_model");
       $id = $this->uri->segment(4);
        $where = "id = '$id'";
        $delete = $this->data["userdata"] = $this->City_model->delete_row($where);
        if($delete){
             $this->session->set_flashdata('deletedsuccess', 'City deleted successfully');   
            redirect('/admin/addcity');
        }else{
             $this->session->set_flashdata('deleteerror', 'City  not deleted  successfully');   
            redirect('/admin/addcity');
        }

    }
    //--------------------------Edit timeslot--------------------//
    public function editcity(){
        $this->load->model("City_model");
        $id = $this->uri->segment(4);
        $data = $this->data["userdatacurrent"] =   $this->City_model->select_all(array(
            "where" => "id = '$id'",

          ));
        $this->load_admin_view('editcity_view');

    }

    //--------------------------Update timeslot--------------------//
    public function updatecitydata(){       
        $this->load->model("City_model");
       // $this->load->model("Timeslots_model");
    if($_POST) {   
        $this->form_validation->set_rules('city', 'city', 'required');
        if ($this->form_validation->run() == FALSE){
            //echo form_error('username');
              $this->index();   
            }else{
             $data =array(
            'cit_name'=> $this->input->post('city'),
            );
             $whereid = $this->input->post('hiddenid');
             $where = "id = '$whereid'";

             $update= $this->City_model->update_row(
                $where ,$data);  
             if($update){
            $this->session->set_flashdata('updatesuccess', 'City updated successfully');   
                 redirect('/admin/addcity');
             }else{ 
            $this->session->set_flashdata('updateerror', 'City not updated successfully');   
           redirect('/admin/addcity');
             }
           
            }    

    }else{   
    redirect('/admin/addcity');
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