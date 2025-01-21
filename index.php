<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('mainpage', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('addList', 'ListController');


Router::run($path);