<?php
// Ativa a exibição de erros para debug (ajuda muito a descobrir o culpado)
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/config/conexao.php';
require_once __DIR__ . '/funcoes/maquina_consulta.php';

/** @var PDO $pdo */

try {
    // Pegando os dados através das funções
    $lista_maquinas   = buscarTodasMaquinas($pdo);
    $total_falhas     = contarMaquinasPorStatus($pdo, 'falha');
    $total_manutencao = contarMaquinasPorStatus($pdo, 'manutencao');
    $total_maquinas   = count($lista_maquinas);
} catch (Exception $e) {
    die("Erro Crítico de Dados: " . $e->getMessage());
}

include_once __DIR__ . '/includes/header.php';
?>

<main class="container">
    
    <section style="display: flex; gap: 15px; justify-content: center; margin: 30px 0; flex-wrap: wrap;">
        <div style="background: white; padding: 15px 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center; border-left: 5px solid #3b82f6; min-width: 160px;">
            <span style="display: block; font-size: 0.7rem; color: #64748b; text-transform: uppercase; font-weight: bold;">Total</span>
            <span style="font-size: 1.8rem; font-weight: bold; color: #1e293b;"><?= $total_maquinas ?></span>
        </div>

        <div style="background: white; padding: 15px 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center; border-left: 5px solid #eab308; min-width: 160px;">
            <span style="display: block; font-size: 0.7rem; color: #64748b; text-transform: uppercase; font-weight: bold;">Em Manutenção</span>
            <span style="font-size: 1.8rem; font-weight: bold; color: #854d0e;"><?= $total_manutencao ?></span>
        </div>

        <div style="background: white; padding: 15px 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center; border-left: 5px solid <?= $total_falhas > 0 ? '#ef4444' : '#10b981' ?>; min-width: 160px;">
            <span style="display: block; font-size: 0.7rem; color: #64748b; text-transform: uppercase; font-weight: bold;">Em Falha</span>
            <span style="font-size: 1.8rem; font-weight: bold; color: <?= $total_falhas > 0 ? '#ef4444' : '#10b981' ?>;"><?= $total_falhas ?></span>
        </div>
    </section>

    <section style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 30px;">
        <form action="acoes/salva_falha.php" method="POST" style="display: flex; gap: 10px; flex-wrap: wrap; align-items: center; justify-content: center;">
            <input type="text" name="nome_equipamento" placeholder="Nome do Equipamento" required style="padding: 10px; border: 1px solid #ddd; border-radius: 5px; flex: 1; min-width: 200px;">
            
            <select name="status_equipamento" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <option value="operando">Operando</option>
                <option value="falha">Falha</option>
                <option value="manutencao">Manutenção</option>
            </select>
            
            <button type="submit" style="background: #2563eb; color: white; border: none; padding: 10px 25px; border-radius: 5px; cursor: pointer; font-weight: bold;">Cadastrar</button>
        </form>
    </section>

    <section>
        <h2 style="font-size: 1.2rem; color: #1e293b; margin-bottom: 15px;">Máquinas Registradas</h2>
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <thead style="background: #f8fafc;">
                <tr>
                    <th style="padding: 15px; text-align: left; border-bottom: 1px solid #edf2f7;">Equipamento</th>
                    <th style="padding: 15px; text-align: left; border-bottom: 1px solid #edf2f7;">Status</th>
                    <th style="padding: 15px; text-align: center; border-bottom: 1px solid #edf2f7;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lista_maquinas)): ?>
                    <?php foreach ($lista_maquinas as $maquina): ?>
                        <tr>
                            <td style="padding: 15px; border-bottom: 1px solid #edf2f7;"><strong><?= htmlspecialchars($maquina['nome_equipamento']) ?></strong></td>
                            <td style="padding: 15px; border-bottom: 1px solid #edf2f7;">
                                <span class="status-badge status-<?= $maquina['status_equipamento'] ?>">
                                    <?= htmlspecialchars($maquina['status_equipamento']) ?>
                                </span>
                            </td>
                            <td style="padding: 15px; text-align: center; border-bottom: 1px solid #edf2f7;">
                                <a href="acoes/deletar.php?id=<?= $maquina['id_maquina'] ?>" 
                                   onclick="return confirm('Excluir este registro?');" 
                                   style="color: #ef4444; text-decoration: none; font-size: 0.9rem; font-weight: bold;">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" style="padding: 30px; text-align: center; color: #94a3b8;">Nenhuma máquina cadastrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</main>

<?php include_once __DIR__ . '/includes/footer.php'; ?>