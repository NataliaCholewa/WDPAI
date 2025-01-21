<?php

require_once 'AppController.php'; //importuje klase

class DefaultController extends AppController {

    public function index(){

        $this->render('login');
    }

    public function mainpage(){

        $this->render('mainpage');  
        
        
    }
    
}