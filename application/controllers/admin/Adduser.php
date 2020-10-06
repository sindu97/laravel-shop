<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adduser extends Admin_C {

	public function __construct(){
		parent::__construct();
		$this->load->model('staff_model');
		$this->load->library('session');
		  $this->load->library('form_validation');
	}

	public function index()	{	
		$this->load->model("Statements_model");
        $this->load->model("User_accounts_model");
        $this->db->select('*');
        $this->db->from('statement');
        $this->db->join('user_accounts', 'user_accounts.username = statement.loginid');
       $this->db->group_by("loginid");
        $query = $this->data["userdatslect"]=$this->db->get();
        // $fill  = $query->result();

        $data2 = $this->data["userdatall"] = $this->Statements_model->select_all(array(
            "select" => "loginid",
            "group_by" => "loginid"
        ));
        $this->load->model("User_accounts_model"); 
         $data = $this->data["userdataowner"] =   $this->User_accounts_model->select_all();

		$this->load_admin_view('add_userview');
	}

	public function adduserdata(){		
		$this->load->model("Statements_model");
		$this->load->model("User_accounts_model");

    if($_POST) {   
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[user_accounts.username]');
        $this->form_validation->set_rules('ownermail', 'ownermail', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password ', 'required');
        $this->form_validation->set_rules('ownername', 'Name ', 'required');
        if ($this->form_validation->run() == FALSE){
            //echo form_error('username');
			  $this->index();	
            }else{
       //-------------get unique id------------------------>
          /*  $login_id = $this->input->post('username');
             $prop_id = $this->data["userdatall"] = $this->Statements_model->select_all(array(
            "where" => "loginid = '$login_id'",   
            "select" => "id",
            "group_by" => "property_id"
        ));
             echo"<pre>";
             print_r($prop_id->result());
             die();
          foreach($prop_id->result() as $uniqueid){
           $uniquepro_id = $uniqueid->id;
       } */
         $username = $this->input->post('username');
          $user_password =  $this->input->post('password');
          $user_email = $this->input->post('ownermail');

             $data =array(
            'username'=> $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'Name' => $this->input->post('ownername'),
            'email' => $this->input->post('ownermail'),
            'uniquepro_id'=> ''
            );
             $insert= $this->User_accounts_model->insert_row(
                $data); 
             if($insert){
//-------------------------mail to owner--------------------------------------//
                echo "email send to user and admin";
                $config = array(
                                    'protocol' => 'mail',
                                    'smtp_host' => 'hostname.com',
                                    'smtp_port' => 465,
                                    'smtp_user' => '', // change it to yours
                                    'smtp_pass' => 'S+3(UxxkB^+K', // change it to yours
                                    'mailtype' => 'html',
                                    'charset' => 'iso-8859-1',
                                    'wordwrap' => TRUE
                                    );              
                    
                            
                    $message ="<html><head><title>Login details</title></head>
                    <body>
                        <h2> Login  Owner Details</h2>
                        
                        <p>Your Account:</p>
                        <p>username: ".$username."</p>
                        <p>Password: ".$user_password."</p>
                        <p>Please click the link below to login into  your account.</p>
                        <h4><a href='".base_url()."owner-portal/'>Login to owner-portal</a></h4>
                    </body>
                    </html>";                       
                
                    $this->load->library('email');
                    $this->email->initialize($config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($config['smtp_user']);
                    $this->email->to($user_email);
                    $this->email->subject('Owner Login details');
                    $this->email->message($message);
                   $mailsend =  $this->email->send();
                  if($mailsend){
                    $this->session->set_flashdata('insertdsuccess', 'User created successfully');   
                    redirect('admin/Adduser');
                  } else{
                    $this->session->set_flashdata('mailsend', 'User created successfully But mail is not send to the user');   
                     redirect('admin/Adduser');
                  } 
            
             }else{
            $this->session->set_flashdata('inserteerror', 'User not created successfully');   
            redirect('admin/Adduser');
             }
           
            }    

    }else{   
   redirect('admin/Adduser');
    }

	}
    //--------------------------Delete owner--------------------//
    public function deleteowner(){
        $this->load->model("User_accounts_model");
       $id = $this->uri->segment(4);
        $where = "id = '$id'";
        $delete = $this->data["userdata"] = $this->User_accounts_model->delete_row($where);
        if($delete){
             $this->session->set_flashdata('deletedsuccess', 'User deleted successfully');   
            redirect('admin/Adduser');
        }else{
             $this->session->set_flashdata('deleteerror', 'User not delted  successfully');   
            redirect('admin/Adduser');
        }

    }
    ///--------------------------- edit owner-------------



    public function Editowner() {   
        $this->load->model("User_accounts_model");
         $id = $this->uri->segment(4);
         $this->load->model("Statements_model"); 
         $data= $this->data["userdata"] = $this->User_accounts_model->select_all(array(
            "where" => "id = '$id'"
        ));
        $this->load->model("User_accounts_model"); 
         $data = $this->data["userdataowner"] =   $this->User_accounts_model->select_all();

        $this->load_admin_view('edituser_view');
    }
//----------------------------change password-----------------
     public function changepassword(){
    $this->load->model("User_accounts_model"); 
    if($_POST) {   
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
         $this->form_validation->set_rules('ownername', 'ownername', 'required');
          $this->form_validation->set_rules('ownermail', 'ownermail', 'required');
        if ($this->form_validation->run() == FALSE){
                $this->index();
            }else{
             $data =array(
            'username'=> $this->input->post('username'),
            'password' => md5($this->input->post('password')),
             'Name' => $this->input->post('ownername'),
            'email' => $this->input->post('ownermail'),
            );
             $whereuser = $this->input->post('username');
             $where = "username = '$whereuser'";

             $update= $this->User_accounts_model->update_row(
                $where ,$data); 
             if($update){
            $this->session->set_flashdata('updatepassword', 'Owner data updated successfully');   
            redirect('admin/adduser/');
             }else{
            $this->session->set_flashdata('notupdatepassword', 'Owner data not updated successfully');   
            redirect('admin/adduser/');
             }
           
            }    

    }else{   
    echo"back";
    }
}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */

?>