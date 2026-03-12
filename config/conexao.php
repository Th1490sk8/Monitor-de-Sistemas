<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$db   = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];

try {
    // DSN: mysql:host=localhost;dbname=resende_tech;charset=utf8mb4
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Transforma erros em exceções
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retorna dados como array associativo
        PDO::ATTR_EMULATE_PREPARES => false, // Melhora a segurança
    ]);
} catch (PDOException $e) {
    die("Erro na conexão com PDO: " . $e->getMessage());
}