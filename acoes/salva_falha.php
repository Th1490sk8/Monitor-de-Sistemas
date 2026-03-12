<?php
require_once __DIR__ . '/../config/conexao.php';

/** @var PDO $pdo */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome_equipamento'];
    $status = $_POST['status_equipamento'];

    // Usamos :nome e :status em vez de ?
    $sql = "INSERT INTO tbl_maquinas (nome_equipamento, status_equipamento) VALUES (:nome, :status)";
    $stmt = $pdo->prepare($sql);

    // No PDO, passamos um array no execute. Bem mais limpo!
    if ($stmt->execute([':nome' => $nome, ':status' => $status])) {
        header("Location: ../index.php?sucesso=1");
        exit();
    } else {
        echo "Erro ao salvar.";
    }
}