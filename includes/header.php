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

    <?php if (isset($_GET['editado'])): ?>
    <div style="background-color: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; text-align: center; margin-bottom: 20px; border: 1px solid #bbf7d0;">
        ✅ Equipamento atualizado com sucesso!
    </div>
    <?php endif; ?>