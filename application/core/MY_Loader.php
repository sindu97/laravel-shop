<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Core Loader
 */
class MY_Loader	 extends CI_Loader
{
	
	function __construct()
	{
		parent::__construct();
	}

	// public function admin_view($file, $data = null){
	// 	echo $this->view('admin/'.$file, $data, TRUE);
	// }

}

?>