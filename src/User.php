<?php

require_once __DIR__ . "/Validator.php";


class User extends Validator
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getName(): string {
        return $this->name; 
    }

    public function setName(string $name): void
    {
        $this->validateName($name);
    }

    public function getEmail(): string {
        return $this->email; 
    }

    public function setEmail(string $email): void
    {
        $this->validateEmail($email);
    }

    public function getPassword(): string {
        return $this->password; 
    }

    public function setPassword(string $password): void
    {
        $this->validatePassword($password);
    }

    public function getId(): int {
        return $this->id; 
    }

    public function setId(int $id): void
    {
        $this->id = $this->generateRandomId();
    }
}
?>