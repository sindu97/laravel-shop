<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pptupload extends Admin_C {

	public function __construct(){
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('staff_model');
		$this->load->library('session');
	}

	public function index()	{	
 	 	
		$this->load_admin_view('pptuploadview');

	}

	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */

?>