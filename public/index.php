<?php

require('../bootstrap.php');
require('../routes.php');


/*$indexController = new app\controllers\IndexController();
$indexController->index();*/

$router->dispatch();