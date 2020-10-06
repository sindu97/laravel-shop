<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("staff_model");
		if($this->staff_model->is_logged_in()){
			redirect(base_url("admin"));
		}
	}

	public function index()
	{
		$this->load->view("admin/login");
		log_activity("Login Page Loaded");		
	}

	public function validate_login(){
		$data = array(
			"success" => false,
			"message" => array()
		);
		if($this->input->is_ajax_request()){
			if(isset($_POST["username"])){

				$this->load->library("form_validation");

				$this->form_validation->set_rules("username", "Username/Email", "trim|required");
				$this->form_validation->set_rules("password", "Password", "trim|required");
				if($this->form_validation->run()){					

					$user = $this->staff_model->select_all(array(
						"where" => "(username = '".$this->input->post('username')."' || email = '".$this->input->post('username')."') && password='".md5(md5($this->input->post("password")))."' && status='active' "
					));
					if($user->num_rows() == 1){
						$this->session->set_userdata("user_login", $user->row());
						$this->staff_model->update_row(array(
							"id" => $this->staff_model->user_id()
						), array(
							"last_login" => date("Y-m-d H:i:s")
						));
						$data["success"] = true ;
					}else{
						$data["message"]["res"] = "Invalid Credentials";
					}
				}else{
					foreach($_POST as $key => $value){
						$data["message"][$key] = form_error($key, " ", " " );
					}
				} 
			}else{
				$data["message"]["res"] = "Direct script not allowed.";
			}
		}else{
			$data["message"]["res"] = "Direct script not allowed.";
		}
		exit(json_encode($data));
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */