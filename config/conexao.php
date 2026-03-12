<?php
// 1. Configurações de acesso
$host = 'localhost';
$user = '';
$password = '';
$database = 'sol_nascente';

// 2. Tentativa de conexão
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
