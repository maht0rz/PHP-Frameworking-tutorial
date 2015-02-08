<?php

namespace app\controllers;

class BaseController{
	
	public function __construct(){

		$helpers = [
			'sum' => function($x, $y){
				return $x+$y;
			},
			'concat' => function(...$params){
				$result = '';
				foreach ($params as $key) {
					$result .= $key;
				}
				return $result;
			}
		];

		$this->view = new \phpocean\core\view\View(
			new \phpocean\core\view\ViewLoader(BASEPATH.'/views/'),
			new \phpocean\core\view\Templating($helpers)
		);
	}
}