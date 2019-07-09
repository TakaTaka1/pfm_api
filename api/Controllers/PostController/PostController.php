<?php
// namespace Api\Controllers\PostController;
use Api\Controllers\PostController\PostTrait;
use Api\Controllers\PostController\PostInterface;
use Api\Exception\ApiException;
use Api\Consts\Api;

class Post implements PostInterface
{
	use PostTrait;
	protected $price;
	protected $category_id;
	protected $date;

	public function __constructor() {
		// TODO set instance DB class

	}

	public function index () {		
		echo 'ssssuccess';
	}
	public function edit ($request_param) {
		// validation
		if(!$validation){
			throw new ApiException('Validation',ApiException::INVALID_VALUE);
			return false;
		}			
		// save params to db		
		try {
			// start transaction
			// commit
			throw new ApiException('Save Error', ApiException::INVALID_RESPONSE)
		} catch(ApiException $e) {
			// rollback
			// return error response
		}

		// return api response 
		echo 'edit';

	}	

	public function put () {
		
	}

	public function delete () {
		// when delete post
	}
}