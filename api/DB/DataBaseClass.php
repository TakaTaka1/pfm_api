<?php
namespace Api\DB;
// TODO define PDO class

class DataBaseClass 
{
	private static $db_instance;
	protected $dsn;
	protected $username;
	protected $password;
	protected $options;

	private function __construct($dsn,$username,$password,$options=null){
		$this->dsn = $dsn;
		$this->username = $username;
		$this->password = $password;
		$this->options = $options;
	}
	//when lost connection
	public function detectLostConnection(){

	}

	public function createPdoConnection($dsn,$username,$password,$options=null){
		try {
			if(is_null(self::$db_instance)){
				self::$db_instance =  new \PDO($dsn,$username, $password, $options);
			}
			return self::$db_instance;
		}catch(PDOException $e){
			exit('failed to connect db'.$e->getMessage());
		}

	}
}
