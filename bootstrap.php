<?php

require('config.php');
require('vendor/autoload.php');

$router = new phpocean\core\router\Router();
$view = new phpocean\core\view\View(
	new phpocean\core\view\ViewLoader(BASEPATH.'/views/')
);