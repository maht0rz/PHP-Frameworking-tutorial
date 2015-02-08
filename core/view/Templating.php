<?php

namespace phpocean\core\view;

class Templating{

	public function __construct($helpers){
		$this->helpers = $helpers;
	}

	public function replaceVariables($view, $variables){
		return preg_replace_callback('/(\\{)(\\{)((?:[a-z]*))(\\})(\\})/',
		function($match) use($variables){
			return $variables[$match[3]];
		}, $view);
	}

	public function applyHelpers($view){
		return preg_replace_callback('/(\\{)(\\{)((?:[a-z0-9_,\\->\\(\\)\\s]*))(\\})(\\})/',
		function($match){
			$helperWithParams = explode('->', $match[3]);
			$helper = trim($helperWithParams[0]);
			$params = explode(',', trim($helperWithParams[1]));
			return call_user_func_array($this->helpers[$helper], $params);
		}, $view);
	}

	public function parse($view, $variables){

		$result = $this->replaceVariables($view, $variables);
		$result = $this->applyHelpers($result);

		return $result;
	}

}