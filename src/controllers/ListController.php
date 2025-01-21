<?php

require_once 'AppController.php';

class ListController extends AppController
{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['text/plain', 'text/html'];  // uploaduje plik tekstowy
    const UPLOAD_DIRECTORY = '/../public/uploads';
    private $messages = [];

    public function addList()
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file($_FILES['file']['tmp_name'], dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);

            return $this->render('mainpage', ['messages' => $this->messages]);
        }
        $this->render('add-List', ['messages' => $this->messages]);
    }

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