<?php require __DIR__ . "/cabecalho.php"; ?>

<section class="caixa">
    <img class="imagem-jogo" src="<?= $jogo->imagem ?>" alt="<?= htmlspecialchars($jogo->nome) ?>">
    <h1><?= htmlspecialchars($jogo->nome) ?></h1>

    <section class="abas">
        <h2>Visao Geral</h2>
        <p><?= htmlspecialchars($jogo->descricao) ?></p>
    </section>

    <section class="abas">
        <h2>Torneios</h2>

        <?php if (isset($_SESSION['id_usuario'])): ?>
            <a class="botao" href="?p=novo-torneio&id_jogo=<?= $jogo->id ?>">Cadastrar novo torneio</a>
        <?php else: ?>
            <a class="botao" href="?p=login">Entrar para cadastrar torneio</a>
        <?php endif; ?>
    </section>
</section>

<?php if (empty($torneios)): ?>
    <p class="vazio">Nenhum torneio cadastrado para este jogo.</p>
<?php endif; ?>

<?php foreach ($torneios as $torneio): ?>
    <article class="card">
        <h2><?= htmlspecialchars($torneio->nome) ?></h2>
        <p><?= htmlspecialchars($torneio->descricao) ?></p>
        <p><strong>Premiacao:</strong> <?= htmlspecialchars($torneio->premiacao ?: 'Nao informada') ?></p>
        <p><strong>Equipes inscritas:</strong> <?= $torneio->total_equipes ?></p>
        <a class="botao" href="?p=torneio&id=<?= $torneio->id ?>">Abrir torneio</a>
    </article>
<?php endforeach; ?>

<?php require __DIR__ . "/rodape.php"; ?>
