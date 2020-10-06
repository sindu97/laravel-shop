<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require ('./php-excel-reader/excel_reader2.php');
require ('./SpreadsheetReader.php');
class Excel_reader
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function read($target){
		new SpreadsheetReader($targetPath);
	}	

}

/* End of file Excel_reader.php */
/* Location: ./application/libraries/Excel_reader.php */
