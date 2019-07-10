<?php
namespace Api\DB;
// TODO define PDO class

class DataBaseClass 
{
	protected $dsn;
	protected $username;
	protected $password;
	protected $options;
	function __constructor($dsn,$username,$password,$options){
// $dsn,$username, $password, $options=null
		$this->dsn = $dsn;
		$this->username = $username;
		$this->password = $password;
		$this->options = $options;
	}
	//when lost connection
	public function detectLostConnection(){

	}

	public function createPdoConnection(){
		try {
			return new PDO($this->dsn,$this->$username, $this->password, $this->options);
		}catch(PDOException $e){
			exit('failed to connect db'.$e->getMessage());
		}

	}
}
