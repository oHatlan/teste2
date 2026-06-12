<?php require __DIR__ . "/cabecalho.php"; ?>

<section class="formulario">
    <h1>Novo torneio</h1>
    <p><strong>Jogo:</strong> <?= htmlspecialchars($jogo->nome) ?></p>

    <form action="?p=salvar-torneio" method="post">
        <input type="hidden" name="csrf" value="<?= Seguranca::token() ?>">
        <input type="hidden" name="id_jogo" value="<?= $jogo->id ?>">

        <label>Nome do torneio</label>
        <input type="text" name="nome" required>

        <label>Descricao</label>
        <textarea name="descricao" rows="4" required></textarea>

        <label>Premiacao</label>
        <input type="text" name="premiacao">

        <footer>
            <button type="submit">Salvar</button>
            <a href="?p=jogo&id=<?= $jogo->id ?>">Voltar</a>
        </footer>
    </form>
</section>

<?php require __DIR__ . "/rodape.php"; ?>
