<?php
require_once __DIR__ . "/UserManager.php";
require_once __DIR__ . "/User.php";
require_once __DIR__ . "/Validator.php";

$system = new UserManager();
$maria = new User("Maria Oliveira", "maria@email.com", "Senha@123");

echo "====Caso 1: Cadastro válido====<br>";
try {
    echo $system->register($maria);
} catch (Exception $error) {
    echo "Erro: " . $error->getMessage();
}

echo "<br>";

echo "====Caso 2: Cadastro com e-mail inválido==== <br> ";
try {
    $pedro = new User("Pedro", "pedro@@email", "Senha$123");
} catch (Exception $error) {
    echo "Erro: " . $error->getMessage();
}

echo "<br>";
echo "<br>";

echo "====Caso 3: Tentativa de login com senha errada==== <br> ";
echo $system->login("joao@email.com", "&rrada123");

echo "<br>";

echo "====Caso 4: Reset de senha válido==== <br> ";
echo $system->resetPassword("maria@email.com", "NovaSenha1@");

echo "<br>";

echo "====Caso 5: Cadastro de usuário com e-mail duplicado==== <br> ";
$maria2 = new User ("Maria Oliveira", "maria@email.com", "SenhaDiferente1!");
echo $system->register($maria2);
?>
