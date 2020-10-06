<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Pagination extends CI_Pagination{
	protected $ci;

	public function __construct(){
		parent::__construct();
		log_message('debug', "MY_Pagination Class Initialized");
        $this->ci =& get_instance();
	}

	public function create_pagination_links($page_url, $total_rows, $per_page){

        $config = array(
            'base_url' => $page_url,
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'full_tag_open' => '<ul class="pagination justify-content-center mt-4">',
	        'full_tag_close' => '</ul>',
	        'first_tag_open' => '<li class="page-item">',
	        'first_tag_close' => '</li>',
	        'next_tag_open' => '<li class="page-item">',
	        'next_tag_close' => '</li>',
	        'num_tag_open' => '<li class="page-item">',
	        'num_tag_close' => '</li>',
	        'prev_tag_open' => '<li class="page-item">',
	        'prev_tag_close' => '</li>',
	        'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
	        'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
	        'last_tag_open' => '<li class="page-item">',
	        'last_tag_close' => '</li>',
	        'prev_tag_open' => '<li class="page-item prev">',
	        'prev_tag_close' => '</li>',
	        'next_tag_open' => '<li class="page-item">',
	        'next_tag_close' => '</li>',
	        'attributes' => ['class' => 'page-link'],
	        "next_link" => "Next Page",
	        "prev_link" => "Previous Page",
	        'first_link' => "First Page",
	        'last_link' => "Last Page",
	        // 'uri_segment' => 2,
	        'num_links' => 2,
	        'use_page_numbers' => true,
	        'enable_query_strings' => true,
	        'page_query_string' => true,
	        'reuse_query_string' => true,
	        'query_string_segment' => 'cp',
        );       

        $this->ci->pagination->initialize($config);
        return $this->ci->pagination->create_links();


    }

}

/* End of file  */
/* Location: ./application/libraries/ */
