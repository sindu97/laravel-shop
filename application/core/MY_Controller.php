<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Core Controller
 */
class Common_C extends CI_Controller{
	public $data = array(
		"extra_header" => "",
		"extra_footer" => "",
		"site_title" => "Eminent Reality",
		"seo_keywords" => "SEO Keywords",
		"seo_description" => "SEO Description"
	);
	function __construct(){
		parent::__construct();
	}

	public function load_front_view($views){
		$this->load->view("frontend/inc/header", $this->data);
		if(is_array($views)){
			foreach($views as $view){
				$this->load->view("frontend/".$view);
			}
		}else{
			$this->load->view("frontend/".$views);
		}		
		$this->load->view("frontend/inc/footer");
	}

	public function load_admin_view($views){
		$this->load->view("admin/inc/header", $this->data);
		$this->load->view("admin/inc/sidebar");
		if(is_array($views)){
			foreach($views as $view){
				$this->load->view("admin/".$view);
			}
		}else{
			$this->load->view("admin/".$views);
		}
		$this->load->view("admin/inc/footer");		
	}
	public function load_owner_view($views){
		$this->load->view("owner-portal/inc/header", $this->data);
		$this->load->view("owner-portal/inc/sidebar");
		if(is_array($views)){
			foreach($views as $view){
				$this->load->view("owner-portal/".$view);
			}
		}else{
			$this->load->view("owner-portal/".$views);
		}
		$this->load->view("owner-portal/inc/footer");		
	}


	    public function load_handyman_view($views){
		$this->load->view("handyman-portal/inc/header", $this->data);
		$this->load->view("handyman-portal/inc/sidebar");
		if(is_array($views)){
			foreach($views as $view){
				$this->load->view("handyman-portal/".$view);
			}
		}else{
			$this->load->view("handyman-portal/".$views);
		}
		$this->load->view("handyman-portal/inc/footer");		
	}



		public function load_tenant_view($views){
		$this->load->view("tenant-portal/inc/header", $this->data);
		$this->load->view("tenant-portal/inc/sidebar");
		if(is_array($views)){
			foreach($views as $view){
				$this->load->view("tenant-portal/".$view);
			}
		}else{
			$this->load->view("tenant-portal/".$views);
		}
		$this->load->view("tenant-portal/inc/footer");		
	}
}


class Front_end extends Common_C{
	function __construct(){
		parent::__construct();
	}
}

// admin controller
class Admin_C extends Common_C {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata("user_login")){
			$this->session->set_flashdata("login_first", "<p class='text-danger'>You Need To Login To Access Admin Panel</p>");
			redirect(base_url("admin/login"));
		}
		$this->data["user"] = $this->session->userdata("user_login");
		$this->data['site_title'] = 'STRAIC | Dashboard';
	}

}


class owner_C extends Common_C {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata("admin_owner_login")){
			$this->session->set_flashdata("login_first", "<p class='text-danger'>You Need To Login To Access Admin Panel</p>");
			redirect(base_url("owner-portal/login"));
		}
		$this->data["user"] = $this->session->userdata("admin_owner_login");
		$this->data['site_title'] = 'STRAIC | Dashboard';

	}
}
//------------------------tenant------------------------------
	class tenant_C extends Common_C {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata("admin_Tenant_login")){
			$this->session->set_flashdata("login_first", "<p class='text-danger'>You Need To Login To Access Admin Panel</p>");
			redirect(base_url("tenant/login"));
		}
		$this->data["user"] = $this->session->userdata("admin_Tenant_login");
		$this->data['site_title'] = 'STRAIC | Dashboard';

	}
}
	//------------------------handyman------------------------------
	class handyman_C extends Common_C {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata("admin_handyman_login")){
			$this->session->set_flashdata("login_first", "<p class='text-danger'>You Need To Login To Access Admin Panel</p>");
			redirect(base_url("tenant/login"));
		}
		$this->data["user"] = $this->session->userdata("admin_handyman_login");
		$this->data['site_title'] = 'STRAIC | Dashboard';

	}
}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */