<?php
session_start();

// 1. Segurança: Trava de login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// 2. Dependências
require_once __DIR__ . '/config/conexao.php';
require_once __DIR__ . '/funcoes/maquina_consulta.php';

// 3. Lógica de Dados
try {
    $lista_maquinas   = buscarTodasMaquinas($pdo);
    $total_falhas     = contarMaquinasPorStatus($pdo, 'falha');
    $total_manutencao = contarMaquinasPorStatus($pdo, 'manutencao');
    $total_maquinas   = count($lista_maquinas);
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}

// 4. Exibição (HTML)
include_once __DIR__ . '/includes/header.php';  
include_once __DIR__ . '/includes/dashboard_view.php';
include_once __DIR__ . '/includes/footer.php';
?>