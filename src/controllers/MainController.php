<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/ProductRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class MainController extends AppController
{
    public function mainpage()
    {

        session_start(); // ✅ Upewniamy się, że sesja działa poprawnie

        if (!isset($_SESSION['user_id'])) {
            die("SESSION user_id not set! Please log in again.");
        }


        $productRepository = new ProductRepository();
        $products = $productRepository->getProductsByUserId($_SESSION['user_id']);

        $this->render('mainpage', ['products' => $products]);
    }
}

