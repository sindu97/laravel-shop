<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Cart Functionality Extended
 */
class MY_Cart extends CI_Cart{
	
	function __construct(){
		parent::__construct();
	}

	public function in_cart($product_id = null) {
	    if ($this->total_items() > 0){
	        $in_cart = array();
	        // Fetch data for all products in cart
	        foreach ($this->contents() AS $item){
	            $in_cart[$item['id']] = $item['qty'];
	        }
	        if ($product_id){
	            if (array_key_exists($product_id, $in_cart)){
	                return $in_cart[$product_id];
	            }
	            return null;
	        }else{
	            return $in_cart;
	        }
	    }
	    return null;    
	}

	public function all_item_count(){
	    $total = 0;
	    if ($this->total_items() > 0){
	        foreach ($this->contents() AS $item){
	            $total = $item['qty'] + $total;
	        }
	    }
	    return $total;
	}

	
}
