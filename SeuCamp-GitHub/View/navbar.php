<nav>
    <a href="?p=inicio" class="logo">SeuCamp</a>

    <ul>
        <li><a href="?p=inicio">Inicio</a></li>
        <li><a href="?p=jogos">Jogos</a></li>
        <li><a href="?p=sobre">Sobre</a></li>

        <?php if (isset($_SESSION['id_usuario'])): ?>
            <li><a href="?p=meus-torneios">Torneios</a></li>
            <li><a href="?p=equipes">Equipes</a></li>
            <li><a href="?p=logout">Logout</a></li>
        <?php else: ?>
            <li><a href="?p=login">Login</a></li>
            <li><a href="?p=cadastro">Cadastro</a></li>
        <?php endif; ?>
    </ul>
</nav>
