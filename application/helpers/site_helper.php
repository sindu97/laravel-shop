<?php 
 
if (! function_exists('log_activity'))
{
	function log_activity($log)
	{
		$CI =& get_instance();
		if($CI->session->has_userdata("user_login")){
			$user = $CI->session->has_userdata("user_login")->id ;
		}else{
			$user = $CI->input->ip_address();
		}
		$page = uri_string();
		$data = "User: ".$user . " || Page: ". $page ." || Datetime: ".date("d-m-Y H:i:s A")." || Log: ". $log ."\r\n";

		$CI->load->helper('file');
		write_file('./logs/'.change_to_dir($user).".txt", $data, "a");
	}
}

function change_to_dir($string){
	$string = trim(strtolower($string));
	$string = str_replace(" ", "_", $string);
	$string = str_replace(":", "_", $string);
	$string = str_replace("-", "_", $string);
	$string = urlencode($string);
	return $string;
}


function url_encode($str){
	$str = strtolower($str);
	$str = str_replace(" ", "-", $str);
	return urlencode($str);
}

function url_decode($str){
	$str = urldecode($str);
	return str_replace("-", " ", $str);
}

function create_slug($string){
    // replace non letter or digits by -
  	$string = preg_replace('~[^\pL\d]+~u', '-', $string);
  	// transliterate
  	$string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
  	// remove unwanted characters
  	$string = preg_replace('~[^-\w]+~', '', $string);
  	// trim
  	$string = trim($string, '-');
  	// remove duplicate -
  	$string = preg_replace('~-+~', '-', $string);
  	// lowercase
  	$string = strtolower($string);
 	if (empty($string)) {
    	return 'n-a';
  	}
  	return $string;
}

// Function to generate 6 digit nnumeric OTP 
function generateNumericOTP() { 
    $generator = "1357902468";   
    $result = "";   
    for ($i = 1; $i <= 6; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
    return $result; 
} 


function print_image($data){
	$output = 'data:image/';
	$basename = basename($data);
	$exp = explode(".", $basename);
	$ext = end($exp);
	$output .= strtoupper($ext).';base64,';
	$base64 = base64_encode(file_get_contents($data));
	$output .= $base64;
	return $output;
}


function isEmptyRow($row) {
    foreach($row as $cell){
        if (null !== $cell) return false;
    }
    return true;
} 
// HOW TO USE? 
// echo '<img src="'.print_image('public/img/test.jpg').'" />';
