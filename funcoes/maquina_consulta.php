<?php
/**
 * Arquivo: funcoes/maquina_consulta.php
 */

function buscarTodasMaquinas($pdo) {
    // Busca todas as máquinas ordenando pelas mais recentes
    $stmt = $pdo->query("SELECT * FROM tbl_maquinas ORDER BY id_maquina DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function contarMaquinasPorStatus($pdo, $status) {
    // Conta quantas máquinas existem com um status específico
    $sql = "SELECT COUNT(*) FROM tbl_maquinas WHERE status_equipamento = :status";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':status' => $status]);
    return $stmt->fetchColumn();
}