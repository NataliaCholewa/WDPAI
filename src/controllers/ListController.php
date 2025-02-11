<?php

require_once 'AppController.php';

class ListController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024; // 1 MB
    const SUPPORTED_TYPES = ['text/plain', 'text/html'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $messages = [];

    public function addList()
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            die("Error: No user session found.");
        }

        if ($this->isPost() && isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
            if ($this->validate($_FILES['file'])) {
                move_uploaded_file(
                    $_FILES['file']['tmp_name'],
                    dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
                );

                return $this->render('grocery-lists', ['messages' => ['List uploaded successfully!']]);
            }
        }

        $this->render('add-list', ['messages' => ['Please select a valid file.']]);
    }

    public function groceryLists()
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            die("Error: No user session found.");
        }

        $directory = dirname(__DIR__) . self::UPLOAD_DIRECTORY;

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $files = array_diff(scandir($directory), ['.', '..']); // Pobiera wszystkie pliki w katalogu uploads

        $this->render('grocery-lists', ['files' => $files]);
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too big!';
            return false;
        }

        if (!in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'Wrong file type!';
            return false;
        }

        return true;
    }
}
