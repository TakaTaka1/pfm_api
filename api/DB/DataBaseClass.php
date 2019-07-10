<?php
namespace DB;
class DataBaseClass 
{
	protected $connections = [];

	public function connect_db($name, $params) {
		$params = array_merge([
			'dsn' => null,
			'user'=> '',
			'password'=>'',
			'options'=>array()

		],$params);
		$connection = new PDO(
			$params['dsn'],
			$params['user'],
			$params['password'],
			$params['options'],
		);
		$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$this->connections[$name] = $connection;
	}
}
