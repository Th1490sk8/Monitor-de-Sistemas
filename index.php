<?php
require_once 'config/conexao.php';

// Busca os dados na tabela tbl_maquinas usando MySQLi
try {
    // No MySQLi, usamos a variável $pdo (que definimos no conexao.php)
    $query = "SELECT * FROM tbl_maquinas";
    $stmt = $pdo->prepare($query);
    
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result(); // Necessário no MySQLi para obter o conjunto de resultados
        $lista_maquinas = $result->fetch_all(MYSQLI_ASSOC); // O equivalente ao fetchAll do PDO
    } else {
        $lista_maquinas = [];
    }
} catch (Exception $e) {
    $lista_maquinas = [];
    // Opcional: echo "Erro técnico: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor de Sistemas Resende-Tech</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <header>
        <h1>Monitor de Sistemas Resende - Tech</h1>
    </header>

    <div style="text-align: center; margin-bottom: 30px; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <p id="sistema" style="font-weight: 600; font-size: 1.2rem; margin-bottom: 10px;">Sistema de Sinergia</p>
        <button onclick="simularFalha()" style="background-color: #67c6e5; color: #1e3a8a; border: none; padding: 10px 20px; border-radius: 6px; font-weight: bold; cursor: pointer;">
            Simular Falha
        </button>
    </div>

    <section>
        <form action="acoes/salvar_falha.php" method="POST">
            <div class="form-group">
                <label>Nome do Equipamento:</label>
                <input type="text" name="nome_equipamento" placeholder="Ex: Prensa Hidráulica" required>
            </div>
            
            <div class="form-group">
                <label>Status Operacional:</label>
                <select name="status_equipamento" required>
                    <option value="operando">Operando</option>
                    <option value="falha">Falha</option>
                    <option value="manutencao">Manutenção</option>
                </select>
            </div>
            
            <button type="submit">Cadastrar Máquina</button>
        </form>
    </section>

    <section>
        <h2>Máquinas Cadastradas</h2>
        <table>
            <thead>
                <tr>
                    <th>Equipamento</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lista_maquinas)): ?>
                    <?php foreach ($lista_maquinas as $maquina): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($maquina['nome_equipamento']); ?></strong></td>
                            <td>
                                <span class="status-badge status-<?php echo $maquina['status_equipamento']; ?>">
                                    <?php echo htmlspecialchars($maquina['status_equipamento']); ?>
                                </span>
                            </td>
                            <td>
                                <a href="acoes/deletar.php?id=<?php echo $maquina['id_maquina'] ?? $maquina['id']; ?>" 
                                   onclick="return confirm('Deseja realmente excluir este registro?');" 
                                   class="btn-delete">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" style="text-align: center; color: #64748b;">Nenhuma máquina registrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <script src="assets/js/script.js"></script>

</body>
</html>