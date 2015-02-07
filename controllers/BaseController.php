<?php

namespace app\controllers;

class BaseController{
	
	public function __construct(){
		$this->view = new \phpocean\core\view\View(
			new \phpocean\core\view\ViewLoader(BASEPATH.'/views/')
		);
	}
}