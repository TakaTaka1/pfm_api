<?php
namespace Api\Controllers\LoginController;
use Api\Validator\ValidatorClass;
use Api\DB\DataBaseClass;
use Api\Consts\Env;

class LoginClass {

	protected $login_params =[];
	protected $validate_rules =[];
	protected $db_adapter;

	function __construct() {
		// $this->db_adapter = new DataBaseClass(
		// 	Env::DB_NAME,
		// 	Env::DB_USER_NAME,
		// 	Env::DB_PASSWORD,
		// 	Env::DB_OPTIONS,
		// );
		$this->db_adapter = DataBaseClass::createPdoConnection(
			Env::DSN,
			Env::DB_USER_NAME,
			Env::DB_PASSWORD,
			// Env::DB_OPTIONS,
		);
	}

	public function login () {
		$this->validate_rules=[
		 "email"=>[
		          "name"=>"氏名",
		          "rule"=>"max-50"
		         ],
		 "password"=>[
		          "name"=>"パスワード",
		          "rule"=>"max-20"
		         ],
		];		
		$this->login_params['email'] = $_POST['email'];
		$this->login_params['password'] = $_POST['password'];
		// $result_validation = ValidatorClass::validation($this->login_params);
		if(count($result_validation) > 0){
			// echo $result_validation
			// return login view
			return false;
		}
		// match params 
		$this->db_adapter->prepare('Select * from user where email=:email AND password =:password');
		$this->db_adapter->bindParam(':email',$this->login_params['email']);
		$this->db_adapter->bindParam(':password',$this->login_params['password']);
		$this->db_adapter->execute();
		$result = $db_adapter->fetchAll(PDO::FETCH_ASSOC);
		if(count($result) == 0){
			return "<script>alert('Not Found!!')</script>"
		} else {
			header('Location: https://'.Env::HOST);
			exit;
		}
		// location service view
	}
	public function logout () {
		
	}
}