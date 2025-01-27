<?php

require_once 'AppController.php';

class ListController extends AppController
{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['text/plain', 'text/html'];  // uploaduje plik tekstowy
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $messages = [];

    public function addList()
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file($_FILES['file']['tmp_name'], dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);

            return $this->render('grocery-lists', ['messages' => $this->messages]);
        }
        $this->render('add-List', ['messages' => $this->messages]);
    }

    public function groceryLists()
    {
        $directory = dirname(__DIR__) . '/../public/uploads/';

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true); // Tworzy katalog, jeśli nie istnieje
        }

        $files = array_diff(scandir($directory), ['.', '..']); // Pobiera wszystkie pliki w katalogu uploads

        $this->render('grocery-lists', ['files' => $files]); // Przekazuje listę plików do widoku
    }


// groceryLists() przetwarza dane (np. listę plików w katalogu uploads).
//Następnie wywołuje metodę render z nazwą pliku widoku (grocery-lists.php) i ewentualnymi danymi do wyświetlenia.

    private function validate(array $file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too big!';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'Wrong file type!';
            return false;
        }

        return true;
    }

}