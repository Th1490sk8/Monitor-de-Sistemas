<?php
// 1. Inclui a conexão (subindo um nível para sair da pasta 'acoes')
require_once __DIR__ . '/../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome_equipamento'];
    $status = $_POST['status_equipamento'];

    // 2. No MySQLi, usamos '?' em vez de ':nome'
    $sql = "INSERT INTO tbl_maquinas (nome_equipamento, status_equipamento) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        // 3. O 'ss' significa que estamos enviando duas strings (s = string)
        $stmt->bind_param("ss", $nome, $status);
        
        if ($stmt->execute()) {
            // Sucesso! Volta para a página principal
            header("Location: ../index.php?sucesso=1");
            exit();
        } else {
            echo "Erro ao salvar: " . $stmt->error;
        }
    } else {
        echo "Erro na preparação do banco: " . $pdo->error;
    }
}