<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_C {

	public function __construct(){
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('Staff_model');
		$this->load->library('session');
		$this->load->model('Statements_model');
	}

	public function index()	{	
 	 	$this->load->model("Statements_model");
		$data = $this->data["userdata"] = $this->Statements_model->select_all();
		$this->load_admin_view('index');

	}

	public function Import_excel_file()
	{
	
	    if(isset($_FILES["xl_file"]["name"]))
				{
					$sheet_name = $_FILES["xl_file"]["name"];
					$path = $_FILES["xl_file"]["tmp_name"];
					$object = PHPExcel_IOFactory::load($path);
					/*echo"<pre>";
					print_r($object);*/

					;
					foreach($object->getWorksheetIterator() as $worksheet)
					{
						;
						$highestRow = $worksheet->getHighestDataRow() ;
						$highestColumn = $worksheet->getHighestColumn();
						
						for($row=2; $row<=$highestRow; $row++)
						{	
						 $rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);	
						 if(!isEmptyRow(reset($rowData))) {	
								
						$loginid=$worksheet->getCellByColumnAndRow(0, $row)->getValue();
						$propertyid=$worksheet->getCellByColumnAndRow(1, $row)->getValue();
						$Managedproperty=$worksheet->getCellByColumnAndRow(2, $row)->getValue();
						$Date=$worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$Num=$worksheet->getCellByColumnAndRow(4, $row)->getValue();
						$Name=$worksheet->getCellByColumnAndRow(5, $row)->getValue();
						$Memo=$worksheet->getCellByColumnAndRow(6, $row)->getValue();
						$PaidAmount=$worksheet->getCellByColumnAndRow(7, $row)->getCalculatedValue();
						
						 $stringDate = \PHPExcel_Style_NumberFormat::toFormattedString($Date, 'YYYY-MM-DD');
						 $data[] = array(
						'loginid' =>$loginid,
						'property_id' => $propertyid,
						'Managedproperty'=>$Managedproperty,
						'Date'	=> $stringDate,
						'Num'	=> $Num,
						'Name'	=> $Name,
						'Memo'	=> $Memo,
						'PaidAmount'=> $PaidAmount,
							);
						    }
						}
					}
					$det = $this->data["userdata"] = $this->Statements_model->getproperty();
					if($det == ''){
						$tablename ="statement";
						$res= $this->Staff_model->insert(
                            $tablename ,$data);
					}else{
					$array_insert= array();	
					foreach($det as $val){	
				    foreach($data as $name=>$data1){
					
						$id = $val['id'];
					    $uploaded = $data1['property_id'];
						$existing = $val['property_id'];
						if($uploaded == $existing){
							 $where = "id = '$id'";
                            $res= $this->Statements_model->update_row(
                            $where ,$data1);
                            unset($data["$name"]);
							}
						}
					  }
					 
					 // insert
					  if(!empty($data)){
					 $tablename ="statement";
					 $res= $this->Staff_model->insert(
                             $tablename ,$data);
					}
							
					}
					if($res){
					$this->session->set_flashdata('excelsuccess', 'File uploaded successfully'); 
				      redirect('Admin');
					}else{
					$this->session->set_flashdata('excelerror', 'File no tuploaded'); 
				      redirect('Admin');
					}
				
				}
		
	}
	 
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */

?>