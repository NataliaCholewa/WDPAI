<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';


class SecurityController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }


    public function login()
    {
        session_start();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser($email);




        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }


        // ✅ Używamy `password_verify()` do sprawdzania hasła
        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_name'] = $user->getName();

        setcookie("user_id", $user->getId(), time() + 3600, "/");

        header("Location: /mainpage");
        exit();
    }


    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $userId = $this->userRepository->addUser($email, $hashedPassword, $name, $surname);

        if (!$userId) {
            return $this->render('register', ['messages' => ['Error registering user.']]);
        }

        // Pobierz użytkownika po ID
        $user = $this->userRepository->getUser($userId);

        if (!$user) {
            return $this->render('register', ['messages' => ['Error fetching user after registration.']]);
        }

        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_name'] = $user->getName();


        header("Location: /mainpage");
        exit();

    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        setcookie(session_name(), '', time() - 3600, '/');

        header("Location: /login");
        exit();
    }



}