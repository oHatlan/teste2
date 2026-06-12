<?php require __DIR__ . "/cabecalho.php"; ?>

<section class="caixa">
    <h1>Minhas equipes</h1>
    <p>Lista de equipes inscritas pelo usuario logado.</p>
</section>

<?php if (empty($equipes)): ?>
    <p class="vazio">Voce ainda nao inscreveu equipes.</p>
<?php endif; ?>

<?php foreach ($equipes as $equipe): ?>
    <article class="card">
        <h2><?= htmlspecialchars($equipe->nome) ?></h2>
        <p><strong>Jogo:</strong> <?= htmlspecialchars($equipe->nome_jogo) ?></p>
        <p><strong>Torneio:</strong> <?= htmlspecialchars($equipe->nome_torneio) ?></p>
        <a class="botao" href="?p=torneio&id=<?= $equipe->id_torneio ?>">Abrir torneio</a>
    </article>
<?php endforeach; ?>

<?php require __DIR__ . "/rodape.php"; ?>
