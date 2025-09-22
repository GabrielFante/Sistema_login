<?php

require_once __DIR__ . "/User.php";

class UserManager
{
    private array $users = [];
    private int $nextId = 1;

    public function Register(string $name, string $email, string $password) {
        if (in_array($email, array_column($this->users, "email"))) {
            echo "E-mail já está em uso! <br> ";
            return;
        }

        try {
            $user = new User($name, $email, $password);
        } catch (InvalidArgumentException $e) {
            echo "Erro: " . $e->getMessage();
            return;
        }
        $this->users[] = [
            "id" => $this->nextId++,
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "password" => $user->getPassword()
        ];
        echo "Usuário cadastrado com sucesso! <br> ";
    }

    public function Login(string $email, string $password) {
        foreach ($this->users as $user) {
            if ($user["email"] === $email && password_verify($password, $user["password"])) {
                echo "Login efetuado! <br> ";
                return;
            }
        }
        echo "Credenciais inválidas! <br> ";
    }

    public function ResetPassword(string $email, string $newPassword) {
        foreach ($this->users as &$user) {
            if ($user["email"] === $email) {
                try {
                    $tempUser = new User($user["name"], $user["email"], $newPassword);
                    $user["password"] = $tempUser->getPassword();
                    echo "Senha redefinida com sucesso! <br> ";
                } catch (InvalidArgumentException $e) {
                    echo "Erro: " . $e->getMessage();
                }
                return;
            }
        }
        echo "Usuário não encontrado! <br> ";
    }
}
