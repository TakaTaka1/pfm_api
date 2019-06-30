<?php
// namespace Api\Controllers\PostController;
use Api\Controllers\PostController\PostTrait;
use Api\Controllers\PostController\PostInterface;
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
		echo 'ssssuccess';
	}
	public function edit () {
		// when page is loaded
		// $this->test(); this is from trait
		echo 'edit';

	}	

	// public function post () {
		// when create or update post
		//echo 'editss';
		// $this->price = $_POST['price'];
		// $this->category_id = $_POST['category_id'];
		// $this->date = $_POST['date'];

		// exception

		// save params to db

		// return response with status code
	// }


	public function put () {
		
	}

	public function delete () {
		// when delete post
	}
}

// POST db保存する
// response