<?php

require_once __DIR__ . "/User.php";

class Validator
{
    public const STRONG_PASSWORD = '/^(?=.[0-9])(?=.[a-z])(?=.[A-Z])(?=.\W).+$/';

    public function emailValidate($email): void
    {
        if (strlen($email) < 5) {
            throw new InvalidArgumentException("O Email deve conter mais do que 5 caracteres!");
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Esse email é invalido");
        }
    }

    public function nameValidate($name): void
    {
        if (strlen($name) < 3) {
            throw new InvalidArgumentException("O nome deve conter mais do que 2 letras");
        } elseif (preg_match('/[0-9]/', $name)) {
            throw new InvalidArgumentException("O nome contém números!!");
        }
        $this->name = $name;
    }

    public function passwordValidate($password): void
    {
        if (strlen($password) < 8) {
            throw new InvalidArgumentException("Minimo de 8 caracteres");
        } elseif (!preg_match(self::STRONG_PASSWORD, $password)) {
            throw new InvalidArgumentException("Senha inválida, deve conter (caracteres especiais, pelo menos 1 letra minúscula e 1 numero)");
        }

        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function generateRandomId(): int
    {
        return random_int(1000, 9999);
    }
}