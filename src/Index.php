<?php
require_once __DIR__ . "/UserManager.php";

$system = new System();

echo "====Caso 1: Cadastro válido====<br>";
try {
    echo $system->Register("Maria Oliveira", "maria@email.com", "Senha@123");
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

echo "<br>";

echo "====Caso 2: Cadastro com e-mail inválido==== <br> ";
try {
    echo $system->Register("Pedro", "pedro@@email", "Senha$123");
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

echo "<br>";
echo "<br>";

echo "====Caso 3: Tentativa de login com senha errada==== <br> ";
echo $system->Login("joao@email.com", "&rrada123");

echo "<br>";

echo "====Caso 4: Reset de senha válido==== <br> ";
echo $system->ResetPassword("maria@email.com", "NovaSenha1@");

echo "<br>";

echo "====Caso 5: Cadastro de usuário com e-mail duplicado==== <br> ";
echo $system->Register("Maria Oliveira 2", "maria@email.com", "SenhaDiferente1!");

