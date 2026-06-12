<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeuCamp</title>
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>

<?php require __DIR__ . "/navbar.php"; ?>

<main>
    <?php if (isset($_SESSION['sucesso'])): ?>
        <p class="mensagem sucesso"><?= htmlspecialchars($_SESSION['sucesso']) ?></p>
        <?php unset($_SESSION['sucesso']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['erro'])): ?>
        <p class="mensagem erro"><?= htmlspecialchars($_SESSION['erro']) ?></p>
        <?php unset($_SESSION['erro']); ?>
    <?php endif; ?>
