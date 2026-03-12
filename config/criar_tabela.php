<?php
// Ativa a exibição de erros para sabermos o que houver de errado
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'conexao.php';

try {
    // Apaga a versão velha para não dar conflito
    $pdo->exec("DROP TABLE IF EXISTS tbl_maquinas");

    // Cria com a sua estrutura exata
    $sql = "CREATE TABLE tbl_maquinas (
        id_maquina INT PRIMARY KEY AUTO_INCREMENT,
        nome_equipamento VARCHAR(100) NOT NULL,
        status_equipamento ENUM('operando', 'falha', 'manutencao') NOT NULL
    )";
    
    $pdo->exec($sql);
    echo "<h1 style='color:green'>✅ SUCESSO! A tabela tbl_maquinas foi criada com id_maquina.</h1>";
    echo "<a href='../index.php'>Voltar para o Início</a>";

} catch (PDOException $e) {
    echo "<h1 style='color:red'>❌ ERRO: " . $e->getMessage() . "</h1>";
}