<?php require __DIR__ . "/cabecalho.php"; ?>

<section class="caixa">
    <h1><?= htmlspecialchars($torneio->nome) ?></h1>
    <p><strong>Jogo:</strong> <?= htmlspecialchars($torneio->nome_jogo) ?></p>
    <p><strong>Descricao:</strong> <?= htmlspecialchars($torneio->descricao) ?></p>
    <p><strong>Premiacao:</strong> <?= htmlspecialchars($torneio->premiacao ?: 'Nao informada') ?></p>
    <p><strong>Quantidade de equipes:</strong> <?= $torneio->total_equipes ?></p>

    <?php if (isset($_SESSION['id_usuario'])): ?>
        <button class="botao" onclick="document.getElementById('modalEquipe').showModal()">Inscrever equipe</button>
    <?php else: ?>
        <a class="botao" href="?p=login">Entrar para inscrever equipe</a>
    <?php endif; ?>
</section>

<h2>Equipes inscritas</h2>

<?php if (empty($equipes)): ?>
    <p class="vazio">Nenhuma equipe inscrita ainda.</p>
<?php endif; ?>

<?php foreach ($equipes as $equipe): ?>
    <article class="card">
        <h3><?= htmlspecialchars($equipe->nome) ?></h3>
        <p><strong>Integrantes:</strong> <?= htmlspecialchars($equipe->integrantes) ?></p>
    </article>
<?php endforeach; ?>

<?php if (isset($_SESSION['id_usuario'])): ?>
    <dialog id="modalEquipe">
        <section class="formulario">
            <h2>Inscrever equipe</h2>

            <form action="?p=inscrever-equipe" method="post">
                <input type="hidden" name="csrf" value="<?= Seguranca::token() ?>">
                <input type="hidden" name="id_torneio" value="<?= $torneio->id ?>">

                <label>Nome da equipe</label>
                <input type="text" name="nome" required>

                <label>Nick do integrante 1</label>
                <input type="text" name="nick1" required>

                <label>Nick do integrante 2</label>
                <input type="text" name="nick2" required>

                <label>Nick do integrante 3</label>
                <input type="text" name="nick3" required>

                <label>Nick do integrante 4</label>
                <input type="text" name="nick4" required>

                <label>Nick do integrante 5</label>
                <input type="text" name="nick5" required>

                <footer>
                    <button type="submit">Inscrever</button>
                    <button type="button" onclick="document.getElementById('modalEquipe').close()">Cancelar</button>
                </footer>
            </form>
        </section>
    </dialog>
<?php endif; ?>

<?php require __DIR__ . "/rodape.php"; ?>
