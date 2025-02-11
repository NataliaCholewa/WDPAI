<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/ProductRepository.php';

class CategoryController extends AppController
{
    public function category()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }

        $categoryName = $_GET['name'] ?? null;

        if (!$categoryName) {
            die("Invalid category.");
        }

        // Mapowanie nazw kategorii na ID
        $categoryMapping = [
            "fruits" => 1,
            "vegetables" => 2,
            "protein" => 3,
            "others" => 4
        ];

        if (!isset($categoryMapping[$categoryName])) {
            die("Category not found.");
        }

        $categoryId = $categoryMapping[$categoryName];

        // ✅ Pobieramy user_id zamiast emaila
        $userRepository = new UserRepository();



        $user = $userRepository->getUser($_SESSION['user_id']);

        if (!$user) {
            die("User not found.");
        }

        $user_id = $user->getId(); // ✅ Pobieramy ID użytkownika zamiast emaila

        $productRepository = new ProductRepository();
        $products = $productRepository->getProductsByCategory($categoryId, $user_id);

        $this->render('category', [
            'products' => $products,
            'categoryName' => ucfirst($categoryName)
        ]);
    }
}
