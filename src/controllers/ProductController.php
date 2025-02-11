<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/ProductRepository.php';

class ProductController extends AppController
{
    public function addProduct()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }

        $userRepository = new UserRepository();
        $user = $userRepository->getUser($_SESSION['user_id']);

        if (!$user) {
            die("User not found.");
        }

        $user_id = $user->getId();


        if ($this->isPost()) {
            $name = $_POST['name'] ?? null;
            $category = isset($_POST['category']) ? (int)$_POST['category'] : null; // ✅ Konwersja na INT
            $expiration_date = $_POST['expiration_date'] ?? null;



            if (!$name || !$category || !$expiration_date) {
                return $this->render('add_product', ['messages' => ['All fields are required!']]);
            }

            $productRepository = new ProductRepository();
            $productRepository->addProduct($user_id, $category, $name, $expiration_date);

            header("Location: /mainpage");
            exit();
        }

        return $this->render('add_product');
    }

    public function addProductForm()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }

        $this->render('add-product'); // 🔹 Ładujemy widok `add-product.php`
    }
}
