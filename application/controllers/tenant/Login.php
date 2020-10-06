<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("tenant_model"); 
		
	}

	public function index()
	{
		$this->load->view("tenant-portal/login");
		//log_activity("Login Page Loaded");		
	}

	public function validate_login(){
	$username =$this->input->post('username');
	$password = md5($this->input->post('password'));    
    $res=$this->tenant_model->logincheck($username,$password);
	 
    if($res == '0'){
       $this->session->set_flashdata('tenantloginerror', 'login details did not match');
	    redirect('tenant/login');           	
	}else{
        $this->session->set_userdata("admin_Tenant_login",$res);
        $user = $this->session->userdata('admin_Tenant_login');
        redirect('tenant');
	
	}
  }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */