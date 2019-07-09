<?php

namespace App\Consts;

class Api {
	// Code for response
	const SUCCESS_CREATE = 200;
	const SUCCESS_EDIT = 200;
	const DELETE_POST = 200;

	static function api_response($response_code){
		return array_merge([
            'success' => self::_return_success_code($response_code),
            'code'    => $response_code,
            'message' => self::_send_message($response_code),
        ],$rtn_json_arr);
	}

	static function _send_message($response_code){
		return [
			self::SUCCESS_CREATE => 'Success Create',
			self::SUCCESS_EDIT => 'Success Edit',
			self::DELETE_POST => 'Success Delete',
		][$response];
	}

	static function _return_success_code($response_code){
		return in_array($response_code,[
            self::SUCCESS_CREATE_POST,
            self::SUCCESS_CREATE_COMMENT,
            self::SUCCESS_REGIST_LIKE,
            self::SUCCESS_REGIST_FAVORITE,
            self::SUCCESS_UPDATE_POST,
            self::SUCCESS_DELETE_POST,
            self::SUCCESS_UNREGIST_LIKE,
            self::SUCCESS_UNREGIST_FAVORITE,
            self::SUCCESS_READ_NOTIFICATION,
            self::SUCCESS_UPDATE_COMMENT,
            self::SUCCESS_DELETE_COMMENT
		]);
	}






}