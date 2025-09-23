<?php
declare(strict_types=1);

require_once __DIR__ . "/User.php";

class Validator
{
    public const STRONG_PASSWORD = '/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).+$/';

    public function validateEmail($email): void
    {
        if (strlen($email) < 5) {
            throw new InvalidArgumentException("O Email deve conter mais do que 5 caracteres!");
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Esse email é invalido");
        }
        $this->email = $email;
    }

    public function validateName($name): void
    {
        if (strlen($name) < 3) {
            throw new InvalidArgumentException("O nome deve conter mais do que 2 letras");
        } elseif (preg_match('/[0-9]/', $name)) {
            throw new InvalidArgumentException("O nome contém números!!");
        }
        $this->name = $name;
    }

    public function validatePassword($password): void
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

    public function validateUser(User $newUser): void
    {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $newUser->getEmail()) {
                echo "E-mail já está em uso! <br> ";
                return;
            }
        }
        $this->users[] = $newUser;
        echo "Usuário cadastrado com sucesso! <br> ";
    }

    public function validateLogin($email, $password): void
    {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email && password_verify($password, $user->getPassword())) {
                echo "Login efetuado! <br> ";
                return;
            }
        }
        echo "Credenciais inválidas! <br> ";
    }

    public function verifyPasswordReset($email, $newPassword): void
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