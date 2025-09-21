<?php

class User
{
    public const STRONG_PASSWORD = '/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W).+$/';
    public const NUMBERS_AND_SPACES = '/^[0-9\s]+$/';
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

    protected function getName(): string
    {
        return $this->name;
    }

    protected function setName(string $name): void
    {
        if (strlen($name) < 3) {
            throw new InvalidArgumentException("O nome deve conter mais do que 2 letras<br>");
        } elseif (preg_match(self::NUMBERS_AND_SPACES, $name)) {
            throw new InvalidArgumentException("O nome contém números ou espaços!!<br>");
        }
        $this->name = $name;
    }

    protected function getEmail(): string
    {
        return $this->email;
    }

    protected function setEmail(string $email): void
    {
        if (strlen($email) < 5){
            throw new InvalidArgumentException("O Email deve conter mais do que 5 caracteres!<br>");
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumenetException("Esse email é invalido<br>");
        }
        $this->email = $email;
    }

    protected function getPassword(): string
    {
        return $this->password;
    }

    protected function setPassword(string $password): void
    {
        if (strlen($password) < 8) {
            throw new InvalidArgumentException("Minimo de 8 caracteres<br>");
        } elseif (!preg_match(self::STRONG_PASSWORD, $password)) {
            throw new InvalidArgumentException("Senha inválida, deve conter (caracteres especiais, pelo menos 1 letra minúscula e 1 numero)<br>");
        }

        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
}
?>
