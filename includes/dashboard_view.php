<main class="container">

<?php if (isset($_GET['status'])): ?>
    <?php if ($_GET['status'] == 'cadastrado'): ?>
        <div style="background: #e0f2fe; color: #0369a1; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #bae6fd; text-align: center;">
            ✨ Novo equipamento cadastrado com sucesso!
        </div>

    <?php elseif ($_GET['status'] == 'editado'): ?>
        <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #bbf7d0; text-align: center;">
            ✅ Equipamento atualizado com sucesso!
        </div>

    <?php elseif ($_GET['status'] == 'deletado'): ?>
        <div style="background: #fee2e2; color: #991b1b; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #fecaca; text-align: center;">
            🗑️ Equipamento removido do sistema.
        </div>
    <?php endif; ?>
<?php endif; ?>

    <section class="dashboard-grid">
        <div class="card-status card-total">
            <span class="card-label">Total</span>
            <span class="card-value"><?= $total_maquinas ?></span>
        </div>

        <div class="card-status card-manutencao">
            <span class="card-label">Em Manutenção</span>
            <span class="card-value"><?= $total_manutencao ?></span>
        </div>

        <div class="card-status <?= $total_falhas > 0 ? 'card-falha' : 'card-ok' ?>">
            <span class="card-label">Em Falha</span>
            <span class="card-value"><?= $total_falhas ?></span>
        </div>
    </section>

    <div class="simulacao-box">
        <p id="sistema">Sistema de Sinergia</p>
        <button onclick="simularFalha()" class="btn-simular">Simular Falha</button>
    </div>

    <section class="form-container">
        <form action="acoes/salva_falha.php" method="POST" class="form-cadastro">
            <input type="text" name="nome_equipamento" placeholder="Nome do Equipamento" required>
            <select name="status_equipamento">
                <option value="operando">Operando</option>
                <option value="falha">Falha</option>
                <option value="manutencao">Manutenção</option>
            </select>
            <button type="submit" class="btn-submit">Cadastrar</button>
        </form>
    </section>

    <section class="table-container">
        <h2>Máquinas Registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>Equipamento</th>
                    <th>Status</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lista_maquinas)): ?>
                    <?php foreach ($lista_maquinas as $maquina): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($maquina['nome_equipamento']) ?></strong></td>
                            <td>
                                <span class="status-badge status-<?= $maquina['status_equipamento'] ?>">
                                    <?= htmlspecialchars($maquina['status_equipamento']) ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <<a href="editar_maquina.php?id=<?= $maquina['id_maquina'] ?>" 
                                    style="color: var(--primary-color); text-decoration: none; font-weight: 700; margin-right: 10px;">
                                    Editar
                                </a>

                                <a href="acoes/deletar.php?id=<?= $maquina['id_maquina'] ?>" 
                                    onclick="return confirm('Excluir este registro?');" 
                                    class="btn-delete">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-empty">Nenhuma máquina cadastrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</main>