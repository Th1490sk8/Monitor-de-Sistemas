<?php
session_start();
require_once __DIR__ . '/../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha_digitada = $_POST['senha'];

    // 1. Buscamos o usuário pelo e-mail
    $stmt = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE email_usuario = :email");
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // 2. O segredo está aqui:
    // password_verify pega a senha digitada e o hash do banco e vê se combinam
    if ($usuario && password_verify($senha_digitada, $usuario['senha_usuario'])) {
        
        // Login com sucesso! Guardamos o usuário na "Sessão" do navegador
        $_SESSION['usuario_id'] = $usuario['id_usuario'];
        $_SESSION['usuario_nome'] = $usuario['nome_usuario'];

        header("Location: ../index.php");
        exit();
    } else {
        // Falha no login
        header("Location: ../login.php?erro=1");
        exit();
    }
}