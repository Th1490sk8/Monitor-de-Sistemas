<?php
require_once '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_equipamento'];
    $status = $_POST['status_equipamento'];

    $stmt = $pdo->prepare("INSERT INTO tbl_maquinas (nome_equipamento, status_equipamento) VALUES (:n, :s)");
    $stmt->execute(['n' => $nome, 's' => $status]);

    header("Location: ../index.php?msg=sucesso");
}