<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handyman extends Admin_C {

    public function __construct(){
        parent::__construct();
        $this->load->library('excel');
        $this->load->model('Statements_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() {   
        
        $this->load->model("Handyman_model");
        $this->data["userdatatenant"] = $this->Handyman_model->select_all();
        $this->load->model("City_model");
        $this->data["userdatatenant123"] = $this->Handyman_model->select_all(array(
            "select" => "city",
        ));
      $this->data["usercity"] = $this->City_model->select_all();
    
       
        $this->load_admin_view('adminhandyman_view');

    }
//----------------------------------edit handyman-----------------------------
    public function edithandyman() { 
      $handy_id = $this->uri->segment(4); 
      $this->load->model("Handyman_model"); 
       $data = $this->data["hadydata"] = $this->Handyman_model->select_all(array(
            "where" => "id = '$handy_id'",
          ));
        $this->load->model("City_model");
       $this->data["usercity"] = $this->City_model->select_all();
    
        $this->load_admin_view('edithandyman_view');

    }
//-------------------updqte handyman-----------------------------
    public function updatehandydata(){
        $this->load->model("Handyman_model"); 
    if($_POST) {  
          $this->form_validation->set_rules('user', 'user', 'required');
        $this->form_validation->set_rules('password', 'password ', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('T_phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('state', 'state', 'trim|required');
        $this->form_validation->set_rules('Addresss', 'Address', 'trim|required');
        $this->form_validation->set_rules('Zip', 'Zip', 'trim|required');
        $this->form_validation->set_rules('City', 'City ', 'required');
        $this->form_validation->set_rules('T_name', 'Name ', 'required');
        if ($this->form_validation->run() == FALSE){
            echo"eroor";
          // $this->index();
            }else{
             $data =array(
            'user'=> $this->input->post('user'),
            'password' => md5($this->input->post('password')),
            'email'=> $this->input->post('email'),
            'phone'=> $this->input->post('T_phone'),
            'name' =>  $this->input->post('T_name'),
            'city' =>  $this->input->post('City'),
            'state' =>  $this->input->post('state'),
            'address' =>  $this->input->post('Addresss'),
            'pin' =>  $this->input->post('Zip'),
            'delte_id'=> '0',
            'status'=> '1'              
            );
        /*echo"<pre>";
        print_r($data);
        die();*/
            $update_id= $this->input->post('hiddenid');
            $where = "id = '$update_id'";
            $update= $this->Handyman_model->update_row(
                $where ,$data);
             if($update){
               $this->session->set_flashdata('updatesuccess', 'Handyman updated successfully');   
            redirect('admin/Handyman/');
             }else{
            $this->session->set_flashdata('updateerror', 'THandyman not updated successfully');   
             redirect('admin/Handyman/');
             } 
         }
    }
}






//------------------------------add-----------------------------    
public function addhandydata(){

        $this->load->helper('email');
        $this->load->model("Handyman_model");
       /* echo"<pre>";
        print_r($_POST);*/ 
    if($_POST) {  
        $this->form_validation->set_rules('user', 'user', 'required|is_unique[handyamn.user]');
        $this->form_validation->set_rules('password', 'password ', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('T_phone', 'Phone', 'trim|required|min_length[10]|max_length[11]');
        $this->form_validation->set_rules('state', 'state', 'trim|required');
        $this->form_validation->set_rules('Addresss', 'Addresss', 'trim|required');
        $this->form_validation->set_rules('Zip', 'Zip', 'trim|required');
       // $this->form_validation->set_rules('City', 'City ', 'required');
        $this->form_validation->set_rules('T_name', 'Name ', 'required');
        if ($this->form_validation->run() == FALSE){
          
             $this->index();   
            }else{
             $data =array(
            'user'=> $this->input->post('user'),
            'password' => md5($this->input->post('password')),
            'email'=> $this->input->post('email'),
            'phone'=> $this->input->post('T_phone'),
            'name' =>  $this->input->post('T_name'),
            'city' =>  $this->input->post('City'),
            'state' =>  $this->input->post('state'),
            'address' =>  $this->input->post('Addresss'),
            'pin' =>  $this->input->post('Zip'),
            'delte_id'=> '0',
            'status'=> '1'              
            );
             $insert= $this->Handyman_model->insert_row(
                $data); 
             if($insert){
               // echo "email send to user and admin";
                      /*$config = array(
                                    'protocol' => 'mail',
                                    'smtp_host' => 'sofineer.com',
                                    'smtp_port' => 465,
                                    'smtp_user' => '', // change it to yours
                                    'smtp_pass' => 'S+3(UxxkB^+K', // change it to yours
                                    'mailtype' => 'html',
                                    'charset' => 'iso-8859-1',
                                    'wordwrap' => TRUE
                                    );              
                    
                            
                    $message ="<html><head><title>Verification Code</title></head>
                    <body>
                        <h2>Admin Registration</h2>
                        <p>Login Details:</p>
                        <p>Your Account:</p>
                        <p>Email: ".$user_email."</p>
                        <p>Password: ".$user_password."</p>
                        <p>Please click the link below to activate your account.</p>
                        <h4><a href='".base_url()."Admin/activate_user/".$res."/".$token."'>Verify your Account to login</a></h4>
                    </body>
                    </html>";                       
                
                    $this->load->library('email');
                    $this->email->initialize($config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($config['smtp_user']);
                    $this->email->to('user2@gmail.com''user3@gmail.com',$user_email);
                    $this->email->subject('Admin Signup Verification Email from CarBazar');
                    $this->email->message($message);
                    $this->email->send();*/
                    $mail ="send";
                   
                
            $this->session->set_flashdata('insertdsuccess', 'handyman created successfully');   
            redirect('admin/Handyman/');
             }else{
            $this->session->set_flashdata('inserteerror', 'handyman not created successfully');   
            redirect('admin/Handyman/');
             }
           
            }    

    }else{   
    redirect('admin/Handyman/');
    }

    }

//--------------------------Delete tenant--------------------//
    public function deletehandyman(){
        $this->load->model("Handyman_model");
       $id = $this->uri->segment(4);
        $where = "id = '$id'";
        $delete = $this->data["userdata"] = $this->Handyman_model->delete_row($where);
        if($delete){
             $this->session->set_flashdata('deletedsuccess', 'Handyman deleted successfully');   
            redirect('admin/Handyman');
        }else{
             $this->session->set_flashdata('deleteerror', 'Handyman not delted  successfully');   
            redirect('admin/Handyman');
        }

    }

//--------------------------All hndynman Requests ------------------//
    public function allrequests(){
        $this->load->model("Estimate_repair_model");
        $this->data["userhany"] = $this->Estimate_repair_model->getall_estimates();
        $this->load_admin_view('esimates_request');

    }






}

?>