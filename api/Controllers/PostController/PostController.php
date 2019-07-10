<?php
// namespace Api\Controllers\PostController;
use Api\Controllers\PostController\PostTrait;
use Api\Controllers\PostController\PostInterface;
use Api\Exception\ApiException;
use Api\Consts\Api;
use Api\Validator\ValidatorClass;
use Api\DB\DataBaseClass;

class Post implements PostInterface
{
	use PostTrait;
	protected $price;
	protected $category_id;
	protected $date;
	protected $db_adapter;
	public function __constructor(DataBaseClass $db) {
		// TODO set instance DB class
		$this->db_adapter = $db;
	}

	public function index () {		
		echo 'ssssuccess';
	}
	public function edit ($request_param) {
		// validation
		$input_control=[
			"name"=>[
			      "name"=>"氏名",
			      "rule"=>"empty|max-50"
			     ],
			"price"=>[
			      "name"=>"価格",
			      "rule"=>"empty|is_num"
			     ],
		];
		$result = ValidatorClass::validation($input_control, $request_param);
		if(count($result)>0){			
			echo "<script>alert($result);</script>";
			return;
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

	public function delete () {
		// when delete post
	}
}