<?php
require_once __DIR__ . '/../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha_pura = $_POST['senha'];

    // --- CRIPTOGRAFIA (HASHING) ---
    // PASSWORD_DEFAULT usa o algoritmo mais forte disponível no PHP (atualmente bcrypt)
    $senha_segura = password_hash($senha_pura, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO tbl_usuarios (nome_usuario, email_usuario, senha_usuario) 
                VALUES (:nome, :email, :senha)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome'  => $nome,
            ':email' => $email,
            ':senha' => $senha_segura // Salvamos o HASH, não a senha pura!
        ]);

        header("Location: ../login.php?status=cadastrado");
        exit();
    } catch (PDOException $e) {
        die("Erro ao cadastrar: " . $e->getMessage());
    }
}