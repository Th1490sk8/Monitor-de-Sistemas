<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$db   = $_ENV['DB_NAME'];

// Criamos a conexão
$pdo = new mysqli($host, $user, $pass, $db);

// Checamos se funcionou
if ($pdo->connect_error) {
    die("Erro de conexão: " . $pdo->connect_error);
}