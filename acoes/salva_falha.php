<?php
// 1. Inclui a conexão
require_once __DIR__ . '/../config/conexao.php';

/** @var mysqli $pdo */ // <-- Isso limpa as linhas vermelhas do VS Code

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome_equipamento'];
    $status = $_POST['status_equipamento'];

    // 2. Preparação
    $sql = "INSERT INTO tbl_maquinas (nome_equipamento, status_equipamento) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $nome, $status);
        
        if ($stmt->execute()) {
            header("Location: ../index.php?sucesso=1");
            exit();
        } else {
            // No MySQLi, erros fatais são pegos pelo objeto de conexão $pdo
            die("Erro ao salvar: " . $pdo->error);
        }
    } else {
        die("Erro na preparação: " . $pdo->error);
    }
}