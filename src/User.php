<?php

class User
{
    public const STRONG_PASSWORD = '/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W).+$/';
    private string $name;
    private string $email;
    private string $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
    public function getPassword(): string { return $this->password; }

    private function setName(string $name): void
    {
        if (strlen($name) < 3) {
            throw new InvalidArgumentException("O nome deve conter mais do que 2 letras");
        } elseif (preg_match('/[0-9]/', $name)) {
            throw new InvalidArgumentException("O nome contém números!!");
        }
        $this->name = $name;
    }

    private function setEmail(string $email): void
    {
        if (strlen($email) < 5) {
            throw new InvalidArgumentException("O Email deve conter mais do que 5 caracteres!");
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Esse email é invalido");
        }
        $this->email = $email;
    }

    private function setPassword(string $password): void
    {
        if (strlen($password) < 8) {
            throw new InvalidArgumentException("Minimo de 8 caracteres");
        } elseif (!preg_match(self::STRONG_PASSWORD, $password)) {
            throw new InvalidArgumentException("Senha inválida, deve conter (caracteres especiais, pelo menos 1 letra minúscula e 1 numero)");
        }

        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
}
