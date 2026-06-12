<?php

$sucesso = '';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Seguranca::validarCsrf();

    try {
        $conn = new PDO(
            "mysql:host=localhost;charset=utf8mb4",
            "root",
            "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        $sql = file_get_contents(__DIR__ . "/sql/schema.sql");
        $conn->exec($sql);
        $sucesso = "Banco criado com sucesso.";
    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}

require __DIR__ . "/View/cabecalho.php";
?>

<section class="caixa">
    <h1>Criar banco de dados</h1>
    <p>Clique no botao abaixo para criar o banco seucamp, as tabelas e os dados de exemplo.</p>

    <?php if ($sucesso): ?>
        <p class="mensagem sucesso"><?= htmlspecialchars($sucesso) ?></p>
        <p>Usuarios de teste:</p>
        <p>joao@email.com / senha 123456</p>
        <p>maria@email.com / senha 123456</p>
        <a class="botao" href="?p=login">Ir para login</a>
    <?php endif; ?>

    <?php if ($erro): ?>
        <p class="mensagem erro"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="csrf" value="<?= Seguranca::token() ?>">
        <button type="submit">Criar banco de dados</button>
    </form>
</section>

<?php require __DIR__ . "/View/rodape.php"; ?>
