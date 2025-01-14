<?php

require_once 'AppController.php'; //importuje klase

class DefaultController extends AppController {

    public function index(){
        // display login.html
        $this->render('login');  
    }

    public function mainpage(){
        // display main.html
        $this->render('mainpage');  
        
        
    }
    
}