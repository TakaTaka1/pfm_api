<?php
// namespace Api\Controllers\PostController;
use DB\DataBaseClass;
use Api\Controllers\PostController\PostTrait;
use Api\Controllers\PostController\PostInterface;
use Api\Request\RequestClass;
// require_once __DIR__ . '/../../../vendor/autoload.php';

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
		// $new = new DataBaseClass;
		// $new->connect_db('user');			
		$request_body = file_get_contents('php://input'); //送信されてきたbodyを取得(JSON形式）			
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			$data = json_decode($request_body,true);
			// fetch DB
			$param = ['code'=>'003_get','message'=>'Success','post_index'=>['price'=>1000,'category_id'=>1,'date'=>20190101],'req'=>$_SERVER['REQUEST_METHOD'],'success'=>'success'];
			echo json_encode($param);
		}
		exit();		
	}
	public function edit () {
		// fetch post data by axios		
		$request_body = file_get_contents('php://input'); //送信されてきたbodyを取得(JSON形式）			
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			// $data = json_decode($request_body,true);  formDataで送らない場合
			header("Content-Type: application/json; charset=utf-8");
			$param = ['code'=>'003_post','message'=>'Success','paid_history'=>['price'=>$_POST['price'],'category_id'=>$_POST['category_id'],'date'=>$_POST['date'],'img'=>$_FILES['file']['name']],'req'=>$_SERVER['REQUEST_METHOD'],'success'=>'success'];			
			echo json_encode($param);
		}
		exit();
	}	
	public function update () {
	// update

	}

	public function delete () {
		// when delete post
	}
}

// POST db保存する
// response