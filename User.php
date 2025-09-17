<?php

class User
{
    public const NUMBERS_AND_SPACES = '/^[0-9\s]+$/';
    private int $id;
    private string $name;
    private string $email;
    private hash $password;

    public function __construct(string $name, string $email, hash $password)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setSenha($password);
    }

    protected function getName(): void
    {
        $this->name = $name;
    }

    protected function setName(string $name): string
    {
        if (strlen($name) < 3) {
            echo "O nome deve conter mais do que 2 letras";
        } elseif (preg_match(self::NUMBER_AND_SPACES, $name)) {
            echo "O nome contém números ou espaços!!";
        }
        return $this->name = $name;
    }

    protected function getEmail(): void
    {
        $this->email = $email;
    }

    protected function setEmail(string $email): string
    {
        if (strlen($email) < 5){
            echo "O Email deve conter mais do que 5 caracteres!";
        }
    }
}