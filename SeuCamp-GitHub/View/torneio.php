<?php require __DIR__ . "/cabecalho.php"; ?>

<section class="caixa">
    <h1><?= htmlspecialchars($torneio->nome) ?></h1>
    <p><strong>Jogo:</strong> <?= htmlspecialchars($torneio->nome_jogo) ?></p>
    <p><strong>Descricao:</strong> <?= htmlspecialchars($torneio->descricao) ?></p>
    <p><strong>Premiacao:</strong> <?= htmlspecialchars($torneio->premiacao ?: 'Nao informada') ?></p>
</section>

<?php require __DIR__ . "/rodape.php"; ?>
