<?php

namespace Api\Controllers\PostController;
use Api\Validator\ValidatorClass;
use Api\Consts\ApiResponse;

trait PostTrait {	
	function save_post($price, $category_id, $date) {
		$input_control=[
			"price"=>[
			      "name"=>"プライス",
			      "rule"=>"is_num"
			],
		];
		$result = ValidatorClass::validation($input_control, ['price'=>$price]);
		if(!empty($result) && count($result)>0){
			throw new \Exception();
			return;
		}

		// if validation is passed
		$sql = "INSERT INTO posts (user_id,category_id,price,img,
		created_at,updated_at) VALUES (:user_id,:category_id,:price,:img,:created_at,null)";
		$db_controller = $this->db_adapter->prepare($sql);		
		$user_id = 1;
		$path = $_FILES['file']['name'];
		$db_controller->bindParam(':user_id',$user_id);
		$db_controller->bindParam(':category_id',$category_id);
		$db_controller->bindParam(':price',$price);
		$db_controller->bindParam(':img',$path);
		$db_controller->bindParam(':created_at',$date);
		$db_controller->execute();		
		self::_response_post($price, $category_id, $date);		
	}
	private function _response_post($price, $category_id, $date) {

		$param = [
			'paid_history'=>[
				'price'=>$price,
				'category_id'=>$category_id,
				'date'=>$date,
				'img'=>$_FILES['file']
			],
		];
		echo $post = ApiResponse::api_response(ApiResponse::SUCCESS_CREATE,$param);			
	}
	function error_checker($result) {
		if(!empty($result) && count($result)>0){			
			echo "<script>alert($result);</script>";
			return;
		}	
	}
}