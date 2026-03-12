<?php include_once __DIR__ . '/includes/header.php'; ?>

<?php
session_start();

// Verifica se existe a sessão do usuário. Se não existir, redireciona para o login.
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit(); // Interrompe o carregamento da página aqui
}
?>
<main class="container">
    <section class="form-container">
        <h2>Criar Conta - Resende-Tech</h2>
        <form action="acoes/cadastrar_usuario.php" method="POST" class="form-cadastro" style="flex-direction: column; align-items: stretch;">
            <input type="text" name="nome" placeholder="Nome Completo" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Crie uma senha" required>
            
            <button type="submit" class="btn-submit">Cadastrar Usuário</button>
            <a href="login.php" style="text-align: center; margin-top: 10px; color: var(--text-muted);">Já tenho conta</a>
        </form>
    </section>
</main>

<?php include_once __DIR__ . '/includes/footer.php'; ?>