<?php
// 1. Inclui a conexão (saindo da pasta 'acoes' para achar 'config')
require_once __DIR__ . '/../config/conexao.php';

/** @var mysqli $pdo */

// 2. Verifica se o ID foi enviado pela URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // 3. Prepara o SQL usando MySQLi (o '?' evita SQL Injection)
    $sql = "DELETE FROM tbl_maquinas WHERE id_maquina = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        // "i" significa que o ID é um número inteiro (integer)
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Sucesso! Redireciona de volta para a lista
            header("Location: ../index.php?deletado=1");
            exit();
        } else {
            echo "Erro ao deletar: " . $pdo->error;
        }
        $stmt->close();
    }
} else {
    // Se tentarem acessar o arquivo sem um ID
    header("Location: ../index.php");
    exit();
}