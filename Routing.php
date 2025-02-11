<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/ListController.php';
require_once 'src/controllers/MainController.php';
require_once 'src/controllers/ProductController.php';
require_once 'src/controllers/CategoryController.php';


class Router {

    public static $routes; 

    public static function get($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function run($url) {
        $action = explode("/", $url)[0];
        // dzieli string wejsciowy wzgledem separatora

        if(!array_key_exists($action, self::$routes)){
            die("wrong url!");

        } 
        // call controller method

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'index';


        $object->$action();

    }
}