<?php

namespace app\controllers;

class IndexController extends BaseController{

	public function index(){
		$this->view->display('hello.php');
	}
}