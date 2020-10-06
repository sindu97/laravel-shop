<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends owner_C {

	public function __construct(){
    parent::__construct();
        $this->load->library('encryption');
    $this->load->library('excel');
    $this->load->model('Staff_model');
    $this->load->library('session');
        $this->load->model("Statements_model");
        $user = $this->session->userdata('admin_owner_login');
         $username = $user->username;
         $this->load->model("Statements_model");
       $this->load->model("User_accounts_model");
     $useremail = $this->data["userdata1"] =   $this->User_accounts_model->select_all(array(
        "select" =>"email",
        "where" => "username = '$username'"
      ));
      $emailuser = $useremail->result()[0]->email;
       $usereproperties = $this->data["userdata1"] =   $this->User_accounts_model->select_all(array(
        "select" =>"username",
        "where" => "email = '$emailuser'"
      ));
       $properties= array();
      foreach($usereproperties->result() as $value){
        $check = $value->username;
      array_push( $properties,$check);
    }
    $this->data["singlepropertydata"]= $properties;

  }

	public function index()	{	
		$user = $this->session->userdata('admin_owner_login');
 	     $username = $user->username;
 	     $this->load->model("Statements_model");
       $this->load->model("User_accounts_model");
     $useremail = $this->data["userdata1"] =   $this->User_accounts_model->select_all(array(
        "select" =>"email",
        "where" => "username = '$username'"
      ));
      $emailuser = $useremail->result()[0]->email;
       $usereproperties = $this->data["userdata1"] =   $this->User_accounts_model->select_all(array(
        "select" =>"username",
        "where" => "email = '$emailuser'"
      ));
       $properties= array();
      foreach($usereproperties->result() as $value){
        $check = $value->username;
      array_push( $properties,$check);
    }
    $allproperties = arraY();
    foreach($properties as $vali){
		 $data =  $this->Statements_model->select_all(array(
		  	"where" => "loginid = '$vali'"
		  ));
     array_push($allproperties,$data->result_array());
    }
     
    $this->data["properties"] = $allproperties;    
    $this->load_owner_view('index');


	}
//------------------------estimats------------------->

	public function allestimates()	{
	$user = $this->session->userdata('admin_owner_login');
		$this->load->model("Estimate_repair_model");
		$this->load->model("Handyman_model");
        $this->load->model("Statements_model");
		$this->session->userdata('Estimate_repair_model');
         $this->data["userdata1"] =   $this->Estimate_repair_model->select_all();
        $data =$this->data["userhany"] =  $this->Estimate_repair_model->getall_estimates();
        $arr1 = array();
        foreach($data as$val){
           $propname = $val->property_name;
           $logindi = $user->username;
           $allproperty = $this->data["allproperty"] =   $this->Statements_model->select_all(array(
            "where" => "Managedproperty = '$propname' && loginid = '$logindi' ",

          ));
            $avc = $allproperty->result();
             array_push( $arr1,$avc);
}
		$this->load_owner_view('allestimates_owner');

	}
//-------------Update All slots--------------------------------

    public function updatestatus(){
         $this->load->model("Estimate_repair_model");
        $id =$this->uri->segment(5);
        $status = $this->uri->segment(4);
     
        if($status == '1'){
         $data =array(
            'approve'=> '1',
            );
         }else{
         $data =array(
            'approve'=> '0',
            );  
         }    
             $where = "id = '$id'";

             $update= $this->Estimate_repair_model->update_row(
                $where ,$data);
             if($update){
                redirect('owner-portal/Dashboard/allestimates');
             }else{
                redirect('owner-portal/Dashboard/allestimates');
                //redirect('admin/Addtimeslot/Allslots');
             }
    }
//--------------------------singleproperty------------------------------------>

    public function singleproperty()  {

       echo $property_id1 = $this->uri->segment(4);
       echo $property = urldecode($property_id1);
         $this->load->model("Statements_model");
   /*     $allproperty = $this->data["userdata1"] =$this->Statements_model->select_all(array(
            "where" => "property_id = '$property'",
            "select" => "property_id",
            "group_by" => "property_id"
          ));
        $prop_id = $allproperty->result();
        foreach($prop_id as $val){
        $prop_idf = $val->property_id;
    }*/
       $userdata = $this->data["userdata"] =$this->Statements_model->select_all(array(
            "where" => "loginid = '$property'"
          ));
        $this->load_owner_view('single_owner');

    }
 
//-----------------------------ajax update approval----------------------->
   public function ajaxapproval()  {
         $this->load->model("Estimate_repair_model");
        $valueapprov = $_POST['valueapprov'];
        $estimateid = $_POST['estimateid'];
        $this->session->userdata('Estimate_repair_model');
        $id = $this->data["userdata1"] =   $this->Estimate_repair_model->select_all(array(
            "where" => "appoint_id = '$estimateid'"
        )
    );
        foreach($id->result() as $vlue){
            $estimateid1 = $vlue->id; 
        }
        $reamrk = $_POST['creat_group'];
        if($reamrk){
        $data1 =array(
            "approve" => $valueapprov,
            "Remarks" => $reamrk
          );
        $where = "id = '$estimateid1'";
        $update= $this->Estimate_repair_model->update_row(
                $where ,$data1);
         }else{

          $data =array(
            "approve" => $valueapprov,
            "Remarks" => ""
          );
            $where = "id = '$estimateid1'";
            $update= $this->Estimate_repair_model->update_row(
                $where ,$data);
            if($update){
                redirect('/owner-portal/Dashboard/allestimates');

            }else{
                redirect('/owner-portal/Dashboard/allestimates');
            }
}
    } 
    //----------ajax property-------------/
    public function ajaxproperty(){
        $property = $_POST['valueproperty']; 
         $this->load->model("Statements_model");
        $allproperty = $this->data["userdata1"] =$this->Statements_model->select_all(array(
            "where" => "Managedproperty = '$property'",
            "select" => "property_id",
            "group_by" => "property_id"
          ));
        $prop_id = $allproperty->result();
        foreach($prop_id as $val){
        $prop_idf = $val->property_id;
    }
       $userdata = $this->data["userdata"] =$this->Statements_model->select_all(array(
            "where" => "property_id = '$prop_idf'"
          ));?>
         <section class="content-header" >
      <h1>
        <?php echo "Single Property Details"?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> 
        <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
        
            <! -- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Managedproperty</th>
                  <th>Date</th>
                  <th>Num</th>
                  <th>Name</th>
                  <th>Memo</th>
                  <th>Paidamount</th>
                </tr>
                </thead>
                <tbody>
               
              <?php foreach($userdata->result() as $val){?>
                <tr>
                  <td><?php echo $val->Managedproperty;?></td>
                  <td><?php echo $val->Date;?></td>
                  <td><?php echo $val->Num;?></td>
                  <td><?php echo $val->Name;?></td>
                  <td><?php echo $val->Memo;?></td>
                  <td><?php echo $val->Paidamount;?></td>
                </tr>

                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Managedproperty</th>
                  <th>Date</th>
                  <th>Num</th>
                  <th>Name</th>
                  <th>Memo</th>
                  <th>Paidamount</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

  <?php  }
}	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */

?>