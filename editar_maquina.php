<?php

session_start();

// Verifica se existe a sessão do usuário. Se não existir, redireciona para o login.
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit(); // Interrompe o carregamento da página aqui
}

require_once __DIR__ . '/config/conexao.php';
require_once __DIR__ . '/funcoes/maquina_consulta.php';

// 1. Pega o ID da URL
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit();
}

// 2. Busca os dados dessa máquina específica (Pode usar o PDO direto aqui para facilitar)
$stmt = $pdo->prepare("SELECT * FROM tbl_maquinas WHERE id_maquina = :id");
$stmt->execute([':id' => $id]);
$maquina = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$maquina) {
    die("Máquina não encontrada.");
}

include_once __DIR__ . '/includes/header.php';
?>

<main class="container">
    <section class="form-container">
        <h2>Editar Equipamento</h2>
        <form action="acoes/editar.php" method="POST" class="form-cadastro">
            <input type="hidden" name="id_maquina" value="<?= $maquina['id_maquina'] ?>">

            <div class="form-group">
                <label>Nome do Equipamento</label>
                <input type="text" name="nome_equipamento" value="<?= htmlspecialchars($maquina['nome_equipamento']) ?>" required>
            </div>
            
            <div class="form-group">
                <label>Status Atual</label>
                <select name="status_equipamento">
                    <option value="operando" <?= $maquina['status_equipamento'] == 'operando' ? 'selected' : '' ?>>Operando</option>
                    <option value="falha" <?= $maquina['status_equipamento'] == 'falha' ? 'selected' : '' ?>>Falha</option>
                    <option value="manutencao" <?= $maquina['status_equipamento'] == 'manutencao' ? 'selected' : '' ?>>Manutenção</option>
                </select>
            </div>
            
            <div style="width: 100%; display: flex; gap: 10px; margin-top: 10px;">
                <button type="submit" class="btn-submit">Salvar Alterações</button>
                <a href="index.php" style="padding: 10px; color: var(--text-muted); text-decoration: none;">Cancelar</a>
            </div>
        </form>
    </section>
</main>

<?php include_once __DIR__ . '/includes/footer.php'; ?>