<?php

class Product
{
    private $id;
    private $user_id;
    private $category_id;
    private $name;
    private $expiration_date;

    public function __construct($id, $user_id, $category_id, $name, $expiration_date)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->category_id = $category_id;
        $this->name = $name;
        $this->expiration_date = $expiration_date;
    }

    public function getId() { return $this->id; }
    public function getUserId() { return $this->user_id; }
    public function getCategoryId() { return $this->category_id; }
    public function getName() { return $this->name; }
    public function getExpirationDate() { return $this->expiration_date; }
}

