<?php
namespace Api\Request;

class RequestClass {
	private $get_params;
	private $post_params;
	public function __construct() {
		$this->get_params = null;
		$this->post_params = null;
	}

	public function get ($get_params) {

	}
	
	public function post ($post_params) {
		return print_r($post_params);
	}	


}