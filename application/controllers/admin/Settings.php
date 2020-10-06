<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends Admin_C {

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load_admin_view('settings/update_settings');
	}

	public function validate_profile_upload(){
		$data = array(
			"success" => false,
			"message" => array()
		);
		if($this->input->is_ajax_request() && isset($_FILES['profile_images'])){
			$data["message"]["res"] = $_FILES["profile_images"];
		}else{
			$data["message"]["res"] = "Direct Script Not Allowed.";
		}
		exit(json_encode($data));
	}

}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */