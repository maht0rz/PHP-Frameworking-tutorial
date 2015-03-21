<?php

namespace phpocean\core\view;

class Templating{

	public function __construct($helpers){
		$this->helpers = $helpers;
	}

	private function replaceVariables(&$view, $variables){
		$view = preg_replace_callback('/(\\{)(\\{)((?:[a-zA-Z]*))(\\})(\\})/',
		function($match) use($variables){
			return $variables[$match[3]];
		}, $view);
	}

	public function applyHelpers(&$view){
		$view = preg_replace_callback('/(\\{)(\\{)((?:[a-zA-Z0-9_,\\->\\(\\)\\s]*))(\\})(\\})/',
		function($match){
			$helperWithParams = explode('->', $match[3]);
			$helper = trim($helperWithParams[0]);
			$params = explode(',', trim($helperWithParams[1]));
			return call_user_func_array($this->helpers[$helper], $params);
		}, $view);
	}

	public function parse($view, $variables){

		$this->replaceVariables($view, $variables);
		$this->applyHelpers($view);

		return $view;
	}

}