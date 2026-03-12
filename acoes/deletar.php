<?php
require_once '../config/conexao.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM tbl_maquinas WHERE id_maquina = :id");
    $stmt->execute(['id' => $_GET['id']]);
}
header("Location: ../index.php");