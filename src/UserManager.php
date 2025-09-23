<?php

require_once __DIR__ . "/User.php";

class UserManager
{
    private array $users = [];

    public function Register(User $user): void {
        if (in_array($user->getEmail(), array_column($this->users, $user->getEmail()))) {
            echo "E-mail já está em uso! <br> ";
            return;
        }

        try {
            $user = new User($name, $email, $password);
        } catch (InvalidArgumentException $error) {
            echo "Erro: " . $error->getMessage();
            return;
        }
        $this->users[] = $user;
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
                } catch (InvalidArgumentException $error) {
                    echo "Erro: " . $error->getMessage();
                }
                return;
            }
        }
        echo "Usuário não encontrado! <br> ";
    }
}

?>
