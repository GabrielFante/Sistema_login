<?php

class User extends Validator
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getName(): string {
        return $this->name; 
    }

    private function setName(string $name): void
    {
        $this->name = $this->nameValidate($name);
    }

    public function getEmail(): string {
        return $this->email; 
    }

    private function setEmail(string $email): void
    {
        $this->email =$this->validateEmail($email);
    }

    public function getPassword(): string {
        return $this->password; 
    }

    private function setPassword(string $password): void
    {
        $this->validatePassword($password);
    }

    private function getId(): int {
        return $this->id; 
    }

    private function setId(int $id): void
    {
        $this->id = $this->generateRandomId();
    }
}
?>