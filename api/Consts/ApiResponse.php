<?php

namespace Api\Consts;

class ApiResponse {
	// Code for response
	const SUCCESS_CREATE = 'c-200';
	const SUCCESS_EDIT = 'e-200';
	const SUCCESS_DELETE_POST = 'd-200';
	const ERROR_INVALID_PARAMS = 400;

	static function api_response($response_code,$json_params){
		self::set_response_code($response_code);
		return json_encode(array_merge([
            'status' => self::is_success_code($response_code),  // true or false
            'code'    => $response_code,
            'message' => self::send_message($response_code),
        ],$json_params),true);
	}
	static function send_message($response_code){
		return [
			self::SUCCESS_CREATE => 'Success Create',
			self::SUCCESS_EDIT => 'Success Edit',
			self::SUCCESS_DELETE_POST => 'Success Delete',
			self::ERROR_INVALID_PARAMS => 'Invalid Params',
		][$response_code];
	}
	static function is_success_code($response_code){
		return in_array($response_code,[
            self::SUCCESS_CREATE,
            self::SUCCESS_EDIT,
		]);
	}
	static function set_response_code($response_code){
		// TODO more status
		$status = [
        	200 => '200 OK',
        	400 => '400 Bad Request',
		];
		// Return response status
		header("Status: {$status[$response_code]}");		
	}
	// test
	static function check_response_code($url, $method){
		$options = self::_curl_options();
		$curl_handler = curl_init($url);
		curl_setopt_array($curl_handler,$options);
		$output = curl_exec($curl_handler);
		$httpcode = curl_getinfo($curl_handler, CURLINFO_HTTP_CODE);		
		curl_close($curl_handler);
		return $httpcode;
	}
	// test
	private function _curl_options() {
        $options = [
            // CURLOPT_VERBOSE => true,
            // CURLOPT_CONNECTTIMEOUT => $this->connectionTimeout,
            CURLOPT_HEADER => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSL_VERIFYPEER => true,
            // CURLOPT_TIMEOUT => $this->timeout,
            // CURLOPT_USERAGENT => $this->userAgent,
            CURLOPT_NOBODY => true,
        ];
        return $options;
	}
}