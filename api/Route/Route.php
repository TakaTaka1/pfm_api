<?php
class Route 
{
	private $_uri = [];
	private $_class = [];
	private $_method = [];

	public function add($uri, $class, $method=null){
		$this->_uri[] = '/' . trim($uri,'/');
		print_r($this->_uri);
		if($class != null) {
			$this->_class[] = $class;
			$this->_method[] = $method;
		}
	}
	public function submit(){
		$uri_get_param = isset($_GET['uri']) ? '/' . $_GET['uri'] : '/';		
		foreach ($this->_uri as $key => $value){					
			if(strpos($this->_method[$key], 'Controller') !== false){
				$this->_method[$key] = $this->_include_controller($this->_method[$key]);
			}
			if(preg_match("#^$value$#", $uri_get_param)) {	
				if(is_string($this->_class[$key])){
					$use_class = $this->_class[$key];
					$call = new $use_class();					
					$func = $this->_method[$key];				
					$call->$func();
				} else {
					call_user_func($this->_class[$key]);
				}
			}
		}		
	}
	private function _include_controller($target_controller=null) {		
		if(!empty($target_controller)) {
			$get_target_controller = [];
			$get_target_controller = explode('/',$target_controller);
			require_once __DIR__ . '/../Controllers/'.$get_target_controller[0].'/'. $get_target_controller[0].'.php';
			return $get_target_controller[1];
		}
		
	}
}