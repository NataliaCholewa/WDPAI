<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Product.php';

class ProductRepository extends Repository
{
    public function addProduct($user_id, $category_id, $name, $expiration_date)
    {
        $stmt = $this->database->connect()->prepare("
            INSERT INTO products (user_id, category_id, name, expiration_date) 
            VALUES (:user_id, :category_id, :name, :expiration_date)
        ");

        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':expiration_date', $expiration_date, PDO::PARAM_STR);

        $stmt->execute();
    }

    public function getProductsByUserId($user_id)
    {
        $stmt = $this->database->connect()->prepare("
            SELECT p.id, p.name, c.name as category, p.expiration_date 
            FROM products p
            JOIN categories c ON p.category_id = c.id
            WHERE p.user_id = :user_id
        ");

        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategory($categoryId, $userId)
    {
        $stmt = $this->database->connect()->prepare("
        SELECT p.id, p.name, p.expiration_date 
        FROM products p
        WHERE p.category_id = :category_id AND p.user_id = :user_id
    ");

        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
