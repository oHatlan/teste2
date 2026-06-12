<?php require __DIR__ . "/cabecalho.php"; ?>

<section class="caixa">
    <h1>Meus torneios</h1>
    <p>Aqui ficam os torneios cadastrados pelo usuario logado.</p>
    <a class="botao" href="?p=jogos">Cadastrar torneio</a>
</section>

<?php if (empty($torneios)): ?>
    <p class="vazio">Voce ainda nao cadastrou torneios.</p>
<?php endif; ?>

<?php foreach ($torneios as $torneio): ?>
    <article class="card">
        <h2><?= htmlspecialchars($torneio->nome) ?></h2>
        <p><strong>Jogo:</strong> <?= htmlspecialchars($torneio->nome_jogo) ?></p>
        <p><strong>Premiacao:</strong> <?= htmlspecialchars($torneio->premiacao ?: 'Nao informada') ?></p>
        <a class="botao" href="?p=torneio&id=<?= $torneio->id ?>">Ver</a>
    </article>
<?php endforeach; ?>

<?php require __DIR__ . "/rodape.php"; ?>
