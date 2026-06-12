<?php require __DIR__ . "/cabecalho.php"; ?>

<section class="formulario">
    <h1><?= htmlspecialchars($titulo) ?></h1>
    <p><strong>Jogo:</strong> <?= htmlspecialchars($jogo->nome) ?></p>

    <form action="<?= htmlspecialchars($acao) ?>" method="post">
        <input type="hidden" name="csrf" value="<?= Seguranca::token() ?>">
        <input type="hidden" name="id_jogo" value="<?= $jogo->id ?>">

        <?php if ($torneio): ?>
            <input type="hidden" name="id" value="<?= $torneio->id ?>">
        <?php endif; ?>

        <label>Nome do torneio</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($torneio->nome ?? '') ?>" required>

        <label>Descricao</label>
        <textarea name="descricao" rows="4" required><?= htmlspecialchars($torneio->descricao ?? '') ?></textarea>

        <label>Premiacao</label>
        <input type="text" name="premiacao" value="<?= htmlspecialchars($torneio->premiacao ?? '') ?>">

        <footer>
            <button type="submit">Salvar</button>
            <a href="?p=jogo&id=<?= $jogo->id ?>">Voltar</a>
        </footer>
    </form>
</section>

<?php require __DIR__ . "/rodape.php"; ?>
