<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_us page
*/
class Rental_find extends Front_end
{
	
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		  $this->load->library('form_validation');
		  $this->load->model('rental_model');
	}

	public function index(){
		$this->load_front_view("findrental");		
		$this->load->library('session');
		  $this->load->library('form_validation');
   
   }
    public function datarental(){
    		$this->form_validation->set_rules('applyingrentaladdress', 'applyingrentaladdress', 'trim|required');
            $this->form_validation->set_rules('moveindate', 'moveindate', 'trim|required');
        	$this->form_validation->set_rules('tenant', 'tenant', 'trim|required');
        	$this->form_validation->set_rules('staylength', 'staylength', 'trim|required');
        	$this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
	        $this->form_validation->set_rules('emailaddress', 'emailaddress', 'trim|required');
	        $this->form_validation->set_rules('phonenumber', 'phonenumber', 'trim|required');
	        $this->form_validation->set_rules('workphonenumber', 'workphonenumber', 'trim|required');
	        $this->form_validation->set_rules('socialsecuritynumber', 'socialsecuritynumber', 'trim|required');
	        $this->form_validation->set_rules('dateofbirth', 'dateofbirth', 'trim|required');
	           $this->form_validation->set_rules('currentdriverlicense', 'currentdriverlicense', 'trim|required');
        $this->form_validation->set_rules('permanentaddress', 'permanentaddress', 'trim|required');
        $this->form_validation->set_rules('permanentcity', 'permanentcity ', 'trim|required');
        $this->form_validation->set_rules('permanentstate', 'permanentstate', 'trim|required');
        $this->form_validation->set_rules('presenthowlong', 'presenthowlong', 'trim|required');
        $this->form_validation->set_rules('presentleavingreason', 'presentleavingreason', 'trim|required');
        $this->form_validation->set_rules('presentrent', 'presentrent', 'trim|required');
        $this->form_validation->set_rules('presentemployername', 'presentemployername', 'trim|required');
        $this->form_validation->set_rules('presentworkposition', 'presentworkposition', 'trim|required');
        $this->form_validation->set_rules('presentworkhowlong', 'presentworkhowlong', 'trim|required');
        $this->form_validation->set_rules('presentworkaddress', 'presentworkaddress', 'trim|required');
        $this->form_validation->set_rules('presentsupervisorphone', 'presentsupervisorphone', 'trim|required');
        $this->form_validation->set_rules('presentsalary', 'presentsalary', 'trim|required');
         $this->form_validation->set_rules('bankname', 'bankname', 'trim|required');
         $this->form_validation->set_rules('bankaccount', 'bankaccount', 'trim|required');
         $this->form_validation->set_rules('bankcity', 'bankcity', 'trim|required');
         $this->form_validation->set_rules('bankstate', 'bankstate', 'trim|required');
         $this->form_validation->set_rules('approxbalance', 'approxbalance', 'trim|required');
         $this->form_validation->set_rules('bankhowlong', 'bankhowlong', 'trim|required');
         $this->form_validation->set_rules('othercredit1', 'othercredit1', 'trim|required');
          if ($this->form_validation->run() == FALSE){
            $this->index();	
          }else{
				$data = array();
				foreach($_POST as $key => $value){
				 $data[$key]=$value;
				 
				}
			array_pop($data);
            array_pop($data);	
          	array_pop($data);
          	 $insert= $this->rental_model->insert_row(
               $data); 
          	 if($insert){
          	          echo "email send to user and admin";
          	          /*$config = array(
									'protocol' => 'mail',
									'smtp_host' => 'sofineer.com',
									'smtp_port' => 465,
									'smtp_user' => '', // change it to yours
									'smtp_pass' => 'S+3(UxxkB^+K', // change it to yours
									'mailtype' => 'html',
									'charset' => 'iso-8859-1',
									'wordwrap' => TRUE
									);				
					
							
					$message ="<html><head><title>Verification Code</title></head>
					<body>
						<h2>Admin Registration</h2>
						<p>Login Details:</p>
						<p>Your Account:</p>
						<p>Email: ".$user_email."</p>
						<p>Password: ".$user_password."</p>
						<p>Please click the link below to activate your account.</p>
						<h4><a href='".base_url()."Admin/activate_user/".$res."/".$token."'>Verify your Account to login</a></h4>
					</body>
					</html>";						
				
					$this->load->library('email');
					$this->email->initialize($config);
					$this->email->set_newline("\r\n");
					$this->email->from($config['smtp_user']);
					$this->email->to('user2@gmail.com''user3@gmail.com',$user_email);
					$this->email->subject('Admin Signup Verification Email from CarBazar');
					$this->email->message($message);
					$this->email->send();*/
          	          die();
          	 }else{
          	 	   echo"error in insert";
          	 }
          
		}
    }

  
}	
     
