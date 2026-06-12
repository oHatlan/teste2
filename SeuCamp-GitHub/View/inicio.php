<?php require __DIR__ . "/cabecalho.php"; ?>

<section class="caixa inicio-topo">
    <h1>SeuCamp</h1>
    <p>Sistema simples para organizar campeonatos de jogos e inscrever equipes.</p>

    <?php if (isset($_COOKIE['ultimo_jogo'])): ?>
        <p>Ultimo jogo acessado: <?= htmlspecialchars($_COOKIE['ultimo_jogo']) ?></p>
    <?php endif; ?>
</section>

<h2 class="titulo-central">Jogos disponiveis</h2>

<section class="grade-inicio">
    <?php foreach ($jogos as $jogo): ?>
        <a class="jogo-inicio" href="?p=jogo&id=<?= $jogo->id ?>">
            <img src="<?= $jogo->imagem ?>" alt="<?= htmlspecialchars($jogo->nome) ?>">
            <strong><?= htmlspecialchars($jogo->nome) ?></strong>
        </a>
    <?php endforeach; ?>
</section>

<?php require __DIR__ . "/rodape.php"; ?>
