<?php

class User {
    private int $id;
    private string $email;
    private string $password;
    private string $name;
    private string $surname;

    public function __construct(int $id, string $email, string $password, string $name, string $surname) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSurname(): string {
        return $this->surname;
    }
}
