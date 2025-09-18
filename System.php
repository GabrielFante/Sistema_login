<?php

require_once "User.php";

class System
{
    private array $users = [];

    public function Register(string $name, string $email, string $password) {
        if (in_array($email, array_column($this->users, "email"))) {
            echo "Esse email já existe!";
        }

        $user = new User($name, $email, $senha);

        $this->users[] = [
        "id" => $this->nextId++,
        "name" => $user->getName(),
        "email" => $user->getEmail(),
        "password" => $user->getPassword()
        ];

        echo "Usuário cadastrado com sucesso!";
        return;
    }

    public function Login(string $email, string $password)
    {
        foreach ($this->users as $user) {
            if ($user["email"] === $email || password_verify($password, $user["password"])) {
                echo "informações incorretas";
            } else {
                echo "Login efetuado!";
            }
            break;
        }
    }

    public function ResetPassword()
    {

    }
}