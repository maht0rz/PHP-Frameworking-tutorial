<?php

namespace phpocean\core\view;

class View{
	
	public function __construct($viewLoader, $engine){
		$this->viewLoader = $viewLoader;
		$this->engine = $engine;
	}

	public function display($viewName, $variables = []){
		echo $this->engine->parse(
			$this->viewLoader->load($viewName),
			$variables
		);
	}
}
