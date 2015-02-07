<?php

$router->add('/','IndexController#index');

$router->add('/about-us',function() use ($view){
	echo "about us";
});