<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_accounts_model");
		/*if($this->user_accounts_model->is_logged_in()){
			redirect(base_url("owner-portal"));
		}*/
	}

	public function index()
	{
		$this->load->view("owner-portal/login");
		//log_activity("Login Page Loaded");		
	}

	public function validate_login(){
	$username =$this->input->post('username');
	$password = md5($this->input->post('password'));    
    $res=$this->user_accounts_model->logincheck($username,$password);
	/* echo"<pre>";
	print_r($res);
	 //$res->name;	
	die();*/
    if($res ==0){
       $this->session->set_flashdata('ownerloginerror', 'login details did not match');
	    redirect('owner-portal/login');           	
	}else{
        $this->session->set_userdata("admin_owner_login",$res);
        redirect('owner-portal');
	
	}
  }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */