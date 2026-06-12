<?php require __DIR__ . "/cabecalho.php"; ?>

<section class="formulario">
    <h1>Cadastro</h1>

    <form action="?p=cadastrar" method="post">
        <input type="hidden" name="csrf" value="<?= Seguranca::token() ?>">

        <label>Nome</label>
        <input type="text" name="nome" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Senha</label>
        <input type="password" name="senha" minlength="6" required>

        <footer>
            <button type="submit">Cadastrar</button>
            <a href="?p=login">Voltar</a>
        </footer>
    </form>
</section>

<?php require __DIR__ . "/rodape.php"; ?>
