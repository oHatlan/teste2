<?php require __DIR__ . "/cabecalho.php"; ?>

<h1>Jogos</h1>

<section class="grade">
    <?php foreach ($jogos as $jogo): ?>
        <article class="card">
            <img class="capa-jogo" src="<?= $jogo->imagem ?>" alt="<?= htmlspecialchars($jogo->nome) ?>">
            <h2><?= htmlspecialchars($jogo->nome) ?></h2>
            <p><?= htmlspecialchars($jogo->descricao) ?></p>
            <a class="botao" href="?p=jogo&id=<?= $jogo->id ?>">Ver torneios</a>
        </article>
    <?php endforeach; ?>
</section>

<?php require __DIR__ . "/rodape.php"; ?>
