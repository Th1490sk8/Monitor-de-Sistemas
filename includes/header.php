<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor de Sistemas Resende-Tech</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
        <h1>Monitor de Sistemas Resende - Tech</h1>

        <?php if (isset($_SESSION['usuario_nome'])): ?>
            <div style="display: flex; align-items: center; gap: 15px;">
                <span style="color: #4b5563;">
                    Olá, <strong><?php echo $_SESSION['usuario_nome']; ?></strong>
                </span>
                <a href="logout.php" style="background-color: #ef4444; color: white; padding: 5px 12px; border-radius: 5px; text-decoration: none; font-size: 14px; font-weight: bold;">
                    Sair
                </a>
            </div>
        <?php endif; ?>
    </header>

    <?php if (isset($_GET['editado'])): ?>
    <div style="background-color: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; text-align: center; margin: 20px; border: 1px solid #bbf7d0;">
        ✅ Equipamento atualizado com sucesso!
    </div>
    <?php endif; ?>