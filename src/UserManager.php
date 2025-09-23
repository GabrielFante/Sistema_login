<?php

require_once __DIR__ . "/User.php";
require_once __DIR__ . "/Validator.php";

class UserManager
{
    private array $users = [];

    public function register(User $newUser): void
    {
        foreach ($this->$users as $user) {
            if (in_array($newUser->getEmail(), array_column($this->users, $user->getEmail()))) {
                echo "E-mail já está em uso! <br> ";
                return;
            }
        }
        $this->users[] = $newUser;
        echo "Usuário cadastrado com sucesso! <br> ";
    }

    public function login(string $email, string $password)
    {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email && password_verify($password, $user->getPassword())) {
                echo "Login efetuado! <br> ";
                return;
            }
        }
        echo "Credenciais inválidas! <br> ";
    }

    public function resetPassword(string $email, string $newPassword)
    {
        foreach ($this->users as &$user) {
            if ($user->getEmail() === $email) {
                try {
                    
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