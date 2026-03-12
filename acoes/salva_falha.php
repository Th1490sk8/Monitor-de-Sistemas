<?php
// Note o ../ para voltar uma pasta e achar o config
require_once __DIR__ . '/../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome_equipamento'];
    $status = $_POST['status_equipamento'];

    try {
        $sql = "INSERT INTO tbl_maquinas (nome_equipamento, status_equipamento) VALUES (:nome, :status)";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute([':nome' => $nome, ':status' => $status])) {
            header("Location: ../index.php?sucesso=1");
            exit();
        }
    } catch (PDOException $e) {
        die("Erro ao salvar: " . $e->getMessage());
    }
}