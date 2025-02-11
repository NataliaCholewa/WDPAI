<?php


require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser($identifier): ?User
    {
        if (is_numeric($identifier)) {
            $stmt = $this->database->connect()->prepare("
            SELECT u.id, u.email, u.password, u.enabled, ud.name, ud.surname
            FROM users u
            LEFT JOIN user_details ud ON u.id = ud.user_id
            WHERE u.id = :identifier
        ");
            $stmt->bindParam(":identifier", $identifier, PDO::PARAM_INT);
        } else {
            $stmt = $this->database->connect()->prepare("
            SELECT u.id, u.email, u.password, u.enabled, ud.name, ud.surname
            FROM users u
            LEFT JOIN user_details ud ON u.id = ud.user_id
            WHERE LOWER(u.email) = LOWER(:identifier)
        ");
            $stmt->bindParam(":identifier", $identifier, PDO::PARAM_STR);
        }
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if (!$user) {
            return null;
        }

        return new User(
            (int) $user['id'],
            $user['email'],
            $user['password'],
            $user['name'] ?? '',
            $user['surname'] ?? ''
        );
    }

    public function addUser($email, $password, $name, $surname): ?int
    {
        $db = $this->database->connect();

        // 🔍 Sprawdzamy, czy użytkownik już istnieje
        $stmt = $db->prepare("SELECT id FROM users WHERE LOWER(email) = LOWER(:email)");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->fetch()) {
            return null; // Użytkownik już istnieje – rejestracja niemożliwa
        }

        // 🆕 Wstawiamy nowego użytkownika do `users`
        $stmt = $db->prepare("
        INSERT INTO users (email, password) 
        VALUES (:email, :password)
        RETURNING id
    ");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        if (!$stmt->execute()) {
            return null;
        }

        // Pobieramy ID nowego użytkownika
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        $userId = (int) $row['id'];

        // ✅ Wstawiamy dane do `user_details` poprawnie, używając `user_id`
        $stmt = $db->prepare("
        INSERT INTO user_details (user_id, name, surname) 
        VALUES (:user_id, :name, :surname)
    ");
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->execute();

        return $userId;
    }




}
