<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->session->unset_userdata("admin_owner_login");
		$this->session->set_flashdata('logout_success', '<p class="text-danger">Logged Out Successfully.</p>');
		redirect(base_url("owner-portal/login"));		
	}
}