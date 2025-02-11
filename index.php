<?php

require 'Routing.php';


$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');                  // to jest url jaki w przegladarce otworzy uzytk
Router::get('mainpage', 'DefaultController');          // np. http://localhost:8080/addList
Router::post('login', 'SecurityController');
Router::post('addList', 'ListController');
Router::get('groceryLists', 'ListController');
Router::get('addProductForm', 'ProductController');
Router::post('addProduct', 'ProductController');
Router::get('mainpage', 'MainController');
Router::get('category', 'CategoryController');
Router::post('register', 'SecurityController');
Router::get('logout', 'SecurityController');




Router::run($path);

