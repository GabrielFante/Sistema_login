# Sistema de Login em PHP

Este é um sistema de login simples desenvolvido em PHP, utilizando classes para gerenciar usuários. O sistema permite cadastrar usuários, fazer login e redefinir senhas com validações de segurança.

---

## Alunos
Gabriel Fante Javarotti - 1990554
João Pedro Pereira Guerra - 2006484

---

## Como rodar o projeto

1. Copie a pasta do projeto para o diretório do seu servidor local (XAMPP):
   C:\xampp\htdocs\src\Index.php
2. Certifique-se de que o Apache e o PHP estão rodando no XAMPP.
3. Acesse o projeto pelo navegador:
4. O arquivo principal para teste é o `index.php`, que já contém os casos de teste.

---

## Funcionalidades implementadas

- **Cadastro de usuário** com validação de:
- Nome (mínimo 3 caracteres e sem números)
- E-mail (formato válido)
- Senha (mínimo 8 caracteres, contendo letras maiúsculas, minúsculas, números e caracteres especiais)
- **Login** com verificação de credenciais.
- **Reset de senha** com validação da nova senha.
- **Evita cadastro de e-mail duplicado**.
- Mensagens de erro claras para facilitar o entendimento do usuário.

---

## Casos de uso

O sistema foi testado com os seguintes cenários:

### Caso 1 — Cadastro válido

- **Entrada:**  
  Nome: `Maria Oliveira`  
  Email: `maria@email.com`  
  Senha: `Senha@123`
- **Resultado esperado:**  
  Usuário cadastrado com sucesso.

### Caso 2 — Cadastro com e-mail inválido

- **Entrada:**  
  Nome: `Pedro`  
  Email: `pedro@@email`  
  Senha: `Senha$123`
- **Resultado esperado:**  
  Mensagem de erro → “Esse email é invalido”

### Caso 3 — Tentativa de login com senha errada

- **Entrada:**  
  Email: `joao@email.com`  
  Senha: `&rrada123`
- **Resultado esperado:**  
  Mensagem de erro → “Credenciais inválidas!”

### Caso 4 — Reset de senha válido

- **Entrada:**  
  Email: `maria@email.com`  
  Nova senha: `NovaSenha1@`
- **Resultado esperado:**  
  Mensagem de sucesso → “Senha redefinida com sucesso!”

### Caso 5 — Cadastro de usuário com e-mail duplicado

- **Entrada:**  
  Nome: `Maria Oliveira 2`  
  Email: `maria@email.com`  
  Senha: `SenhaDiferente1!`
- **Resultado esperado:**  
  Mensagem de erro → “E-mail já está em uso!”

---

## Observações

- Todas as senhas são armazenadas de forma **criptografada** utilizando `password_hash`.
- O sistema utiliza apenas arrays para armazenar os usuários em memória (não há banco de dados).
- É recomendado rodar o projeto em um ambiente local com PHP 7.4 ou superior.


