<?php
// namespace Api\Controllers\PostController;
use Api\Controllers\PostController\PostTrait;
use Api\Controllers\PostController\PostInterface;
use Api\Exception\ApiException;
use Api\DB\DataBaseClass;
use Api\Consts\ApiResponse;
use Api\Consts\Env;

class Post implements PostInterface
{
	use PostTrait;
	protected $price;
	protected $category_id;
	protected $date;
	protected $db_adapter;
	public function __construct() {
		$this->db_adapter = DataBaseClass::createPdoConnection(
			Env::DSN,
			Env::DB_USER_NAME,
			Env::DB_PASSWORD,
			// Env::DB_OPTIONS,
		);
	}

	public function index () {				
		$query = "SELECT * FROM users";
		$db_controller = $this->db_adapter->prepare($query);
		$db_controller->execute();
		echo json_encode($db_controller->fetchall());
	}
	public function edit () {		
		try {
			// start transaction
			$this->save_post($_POST['price'],$_POST['category_id'],$_POST['date']);			
		} catch(\Exception $e) {
			// rollback
			echo ApiResponse::api_response(ApiResponse::ERROR_INVALID_PARAMS,[]);
			// return error response
		}	
		return;
	}	

	public function delete () {
		// when delete post
	}
}