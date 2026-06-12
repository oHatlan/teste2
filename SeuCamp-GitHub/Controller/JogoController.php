<?php

require_once __DIR__ . "/../Model/Jogo.php";
require_once __DIR__ . "/../Model/Torneio.php";

class JogoController {
    public static function listar() {
        $jogos = Jogo::listarTodos();
        require __DIR__ . "/../View/jogos.php";
    }

    public static function ver() {
        $id = (int) ($_GET['id'] ?? 0);
        $jogo = Jogo::buscarPorId($id);

        if (!$jogo) {
            $_SESSION['erro'] = 'Jogo nao encontrado.';
            header("Location: ?p=jogos");
            exit;
        }

        setcookie('ultimo_jogo', $jogo->nome, time() + 60 * 60 * 24 * 30);

        $torneios = Torneio::listarPorJogo($id);
        require __DIR__ . "/../View/jogo.php";
    }
}
