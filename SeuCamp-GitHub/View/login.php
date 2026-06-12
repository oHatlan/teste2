<?php require __DIR__ . "/cabecalho.php"; ?>

<section class="formulario">
    <h1>Login</h1>

    <form action="?p=entrar" method="post">
        <input type="hidden" name="csrf" value="<?= Seguranca::token() ?>">

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Senha</label>
        <input type="password" name="senha" required>

        <footer>
            <button type="submit">Entrar</button>
            <a href="?p=cadastro">Criar conta</a>
        </footer>
    </form>
</section>

<?php require __DIR__ . "/rodape.php"; ?>
