<?php

namespace phpocean\core\router;

class Router{

	private $routes = [];
	private $notFound;

	public function __construct(){
		$this->notFound = function($url){
			echo "404 - $url was not found!";
		};
	}

	public function add($url, $action){
		$this->routes[$url] = $action;
	}

	public function setNotFound($action){
		$this->notFound = $action;
	}

	public function dispatch(){
		foreach ($this->routes as $url => $action) {
			if( $url == $_SERVER['REQUEST_URI'] ){
				if(is_callable($action)) return $action();
				
				$actionArr = explode('#', $action);
				$controller = 'app\\controllers\\'.$actionArr[0];
				$method = $actionArr[1];

				return (new $controller)->$method();
			}
		}
		call_user_func_array($this->notFound,[$_SERVER['REQUEST_URI']]);
	}
}