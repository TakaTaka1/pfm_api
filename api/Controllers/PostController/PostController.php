<?php
// namespace Api\Controllers\PostController;
use Api\Controllers\PostController\PostTrait;
use Api\Controllers\PostController\PostInterface;
use Api\Exception\ApiException;
use Api\Consts\Api;
use Api\Validator\ValidatorClass;
use Api\DB\DataBaseClass;
use Api\Consts\Env;

class Post implements PostInterface
{
	use PostTrait;
	protected $price;
	protected $category_id;
	protected $date;
	protected $db_adapter;
	public function __construct() {
		// TODO set instance DB class
		$this->db_adapter = DataBaseClass::createPdoConnection(
			Env::DSN,
			Env::DB_USER_NAME,
			Env::DB_PASSWORD,
			// Env::DB_OPTIONS,
		);
	}

	public function index () {		
		$test_sql = "INSERT INTO users (username, created_at) VALUES (:username, now())";
		$db_controller = $this->db_adapter->prepare($test_sql);
		$name = 'test_user';
		$db_controller->bindParam(':username',$name);
		$db_controller->execute();
		echo 'test';
	}
	public function edit ($request_param=null) {
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
			throw new ApiException('Save Error', ApiException::INVALID_RESPONSE);
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