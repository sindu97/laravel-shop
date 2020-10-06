<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("handyman_model"); 
		
	}

	public function index()
	{
		$this->load->view("handyman-portal/login");
		//log_activity("Login Page Loaded");		
	}

	public function validate_login(){
	echo $username =$this->input->post('username');
	echo $password = md5($this->input->post('password'));    
    $res=$this->handyman_model->logincheck($username,$password);
	 
    if($res == '0'){
       $this->session->set_flashdata('handymanloginerror', 'login details did not match');
	    redirect('handyman/login');           	
	}else{
        $this->session->set_userdata("admin_handyman_login",$res);
        $user = $this->session->userdata('admin_handyman_login');
        redirect('handyman');
	
	}
  }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */