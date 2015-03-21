<?php

namespace phpocean\core\view;

class ViewLoader{

	public function __construct($path){
		$this->path = $path;
	}

	public function load($viewName){
		$path = $this->path.$viewName.'.php';
		if( file_exists($path) ){
			return file_get_contents($path);
		}
		throw new \Exception("View does not exist: ".$viewName);
	}
}