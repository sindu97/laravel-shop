<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addtenant extends Admin_C {

    public function __construct(){
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('Statements_model');
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function index()	{	
		$user = $this->session->userdata('admin_Tenant_login');
 	    $this->data["userdata"] = $this->Statements_model->select_all(array(
			"select" => "Managedproperty",
            "group_by" => "property_id"
		));
		$this->load->model("Tenant_model");
		$this->load->model("City_model");
        //$abc = $this->data["userdata"]->result();
		$this->data["userdatatenant"] = $this->Tenant_model->select_all();
        $this->data["usercity"] = $this->City_model->select_all();
	$this->load_admin_view('addtenant_view');

	}
//----------------------------------edit-----------------------------
    public function edittenat() { 
      $ten_id = $this->uri->segment(4); 
      $this->load->model("Tenant_model"); 
       $data = $this->data["tenantdata"] = $this->Tenant_model->select_all(array(
            "where" => "id = '$ten_id'",
          ));
      /* $check =$data->result();
        echo"<pre>";
        print_r($check);
      die();*/
        $user = $this->session->userdata('admin_Tenant_login');
        $this->data["userdata"] = $this->Statements_model->select_all(array(
            "select" => "Managedproperty"
        ));
         $this->load->model("City_model");
       $this->data["usercity"] = $this->City_model->select_all();
        $this->load->model("Tenant_model");
        //$abc = $this->data["userdata"]->result();
        $this->data["userdatatenant"] = $this->Tenant_model->select_all();
    
        $this->load_admin_view('edit_tenantview');

    }
//-------------------updqte tenant-----------------------------
    public function updatetenantdata(){
        $this->load->helper('email');
        $this->load->model("Tenant_model"); 
    if($_POST) {  
        $this->form_validation->set_rules('user', 'user', 'required');
        $this->form_validation->set_rules('password', 'password ', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('city', 'City', 'required');
       $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == FALSE){
            
           $this->index();
            }else{
             $data =array(
            'user'=> $this->input->post('user'),
            'password' => md5($this->input->post('password')),
            'property_name'=> $this->input->post('property'),
            'tenant_email'=> $this->input->post('email'),
            'name' => $this->input->post('name'),
            'city' => $this->input->post('city'),
            'delete_id'=> '0',
            'status'=> '1'              
            );
            $update_id= $this->input->post('hidenid');
            $where = "id = '$update_id'";
            $update= $this->Tenant_model->update_row(
                $where ,$data);
             if($update){
               $this->session->set_flashdata('updatesuccess', 'Tenant updated successfully');   
            redirect('admin/Addtenant');
             }else{
            $this->session->set_flashdata('updateerror', 'Tenant not updated successfully');   
             redirect('admin/Addtenant');
             } 
         }
    }
}






//------------------------------add-----------------------------    
public function addtenantdata(){

		$this->load->helper('email');
		$this->load->model("Tenant_model"); 
    if($_POST) {  
        $this->form_validation->set_rules('user', 'user', 'required|is_unique[tenants.user]');
        $this->form_validation->set_rules('password', 'password ', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('property1', 'Property', 'required');
        $this->form_validation->set_rules('City', 'city ', 'required');
        $this->form_validation->set_rules('T_name', 'Name ', 'required');
        if ($this->form_validation->run() == FALSE){
            
           // echo form_error('username');
			  $this->index();	
            }else{
             $data =array(
            'user'=> $this->input->post('user'),
            'password' => md5($this->input->post('password')),
            'property_name'=> $this->input->post('property1'),
            'tenant_email'=> $this->input->post('email'),
            'name' =>  $this->input->post('T_name'),
            'city' =>  $this->input->post('City'),
            'delete_id'=> '0',
            'status'=> '1'	            
            );
             $tenantemail = $this->input->post('email');
             $insert= $this->Tenant_model->insert_row(
                $data); 
             if($insert){
             	echo "email send to user and admin";
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
          	       
          	    
            $this->session->set_flashdata('insertdsuccess', 'Tenant created successfully');   
            redirect('admin/Addtenant');
             }else{
            $this->session->set_flashdata('inserteerror', 'Tenant not created successfully');   
            redirect('admin/Addtenant');
             }
           
            }    

    }else{   
    redirect('admin/Addtenant');
    }

	}

public function updatestatus(){
         $this->load->model("Tenant_model");
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

             $update= $this->Tenant_model->update_row(
                $where ,$data);
             if($update){
                redirect('admin/Addtenant');
             }else{
                redirect('admin/Addtenant');
             }
    }

//--------------------------Delete tenant--------------------//
    public function deletetenant(){
        $this->load->model("Tenant_model");
       $id = $this->uri->segment(4);
        $where = "id = '$id'";
        $delete = $this->data["userdata"] = $this->Tenant_model->delete_row($where);
        if($delete){
             $this->session->set_flashdata('deletedsuccess', 'Tenant deleted successfully');   
            redirect('admin/Addtenant');
        }else{
             $this->session->set_flashdata('deleteerror', 'Tenant not delted  successfully');   
            redirect('admin/Addtenant');
        }

    }
}

?>