<?php

require_once __DIR__ . "/User.php";
require_once __DIR__ . "/Validator.php";

class UserManager extends Validator
{
    protected array $users = [];

    public function register(User $newUser): void
    {
        $this->validateUser($newUser);
    }

    public function login(string $email, string $password)
    {
        $this->validateLogin($email, $password);
    }

    public function resetPassword(string $email, string $newPassword)
    {
        $this->verifyPasswordReset($email, $newPassword);
    }
}
?>