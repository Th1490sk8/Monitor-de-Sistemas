<?php include_once __DIR__ . '/includes/header.php'; ?>

<main class="container">
    <section class="form-container" style="max-width: 400px; margin: 0 auto;">
        <h2 class="text-center">Acesso Resende-Tech</h2>

        <?php if(isset($_GET['erro'])): ?>
            <div style="background:#fee2e2; color:#991b1b; padding:10px; border-radius:8px; margin-bottom:15px; text-align:center;">
                E-mail ou senha inválidos!
            </div>
        <?php endif; ?>

        <form action="acoes/login_auth.php" method="POST" class="form-cadastro" style="flex-direction: column; align-items: stretch;">
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="email" required placeholder="seu@email.com">
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" required placeholder="******">
            </div>
            <button type="submit" class="btn-submit">Entrar no Sistema</button>
            <p style="text-align:center; font-size:14px; margin-top:15px;">
                Não tem conta? <a href="cadastrar.php">Cadastre-se aqui</a>
            </p>
        </form>
    </section>
</main>

<?php include_once __DIR__ . '/includes/footer.php'; ?>