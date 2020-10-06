<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newpassword extends Admin_C {

	public function __construct(){
		parent::__construct();
		$this->load->model('staff_model');
	   $this->load->helper('array');
       $this->load->library('form_validation');
	}

	public function index()	{	
        $this->load->model("user_accounts_model");
        $data = $this->data["userdata"] = $this->user_accounts_model->select_all(array(
            "select" => "username"
        ));	
      /* echo"<pre>";
       print_r($data->result());*/
		$this->load_admin_view('new_password');
	}

    public function changepassword(){
    $this->load->model("user_accounts_model"); 
    if($_POST) {   
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == FALSE){
                $this->index();
            }else{
             $data =array(
            'username'=> $this->input->post('username'),
            'password' => md5($this->input->post('password'))
            );
             $whereuser = $this->input->post('username');
             $where = "username = '$whereuser'";

             $update= $this->user_accounts_model->update_row(
                $where ,$data); 
             if($update){
            $this->session->set_flashdata('adduser', 'Password updated successfully');   
            redirect('admin/Newpassword');
             }else{
            $this->session->set_flashdata('addusreerror', 'Password not updated successfully');   
            redirect('admin/Newpassword');
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