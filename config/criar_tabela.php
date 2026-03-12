<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ajuste o caminho conforme necessário (se o arquivo estiver na pasta 'acoes', use ../)
require_once 'config/conexao.php'; 

/** @var mysqli $pdo */

// No MySQLi não usamos exec(), usamos query()
try {
    // 1. Apaga a tabela antiga
    $pdo->query("DROP TABLE IF EXISTS tbl_maquinas");

    // 2. Cria a tabela com a estrutura correta
    $sql = "CREATE TABLE tbl_maquinas (
        id_maquina INT PRIMARY KEY AUTO_INCREMENT,
        nome_equipamento VARCHAR(100) NOT NULL,
        status_equipamento ENUM('operando', 'falha', 'manutencao') NOT NULL
    )";
    
    if ($pdo->query($sql)) {
        echo "<h1 style='color:green'>✅ SUCESSO! A tabela tbl_maquinas foi criada com MySQLi.</h1>";
        echo "<a href='index.php'>Voltar para o Início</a>";
    }

} catch (mysqli_sql_exception $e) {
    echo "<h1 style='color:red'>❌ ERRO: " . $e->getMessage() . "</h1>";
}