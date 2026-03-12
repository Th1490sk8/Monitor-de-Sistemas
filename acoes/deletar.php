<?php
require_once __DIR__ . '/../config/conexao.php';

/** @var PDO $pdo */

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_maquinas WHERE id_maquina = :id";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([':id' => $id])) {
        header("Location: ../index.php?deletado=1");
        exit();
    }
}