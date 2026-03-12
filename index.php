<?php
require_once __DIR__ . '/config/conexao.php';
require_once __DIR__ . '/funcoes/maquina_consulta.php';

try {
    $lista_maquinas   = buscarTodasMaquinas($pdo);
    $total_falhas     = contarMaquinasPorStatus($pdo, 'falha');
    $total_manutencao = contarMaquinasPorStatus($pdo, 'manutencao');
    $total_maquinas   = count($lista_maquinas);
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}

// Montagem da página
include_once __DIR__ . '/includes/header.php';  
include_once __DIR__ . '/includes/dashboard_view.php'; // O HTML que você moveu
include_once __DIR__ . '/includes/footer.php';
?>