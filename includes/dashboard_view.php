<main class="container">
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