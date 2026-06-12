<?php

require_once __DIR__ . "/../Model/Equipe.php";

class EquipeController {
    public static function minhas() {
        $equipes = Equipe::listarPorUsuario($_SESSION['id_usuario']);
        require __DIR__ . "/../View/equipes.php";
    }

    public static function inscrever() {
        Seguranca::validarCsrf();

        $idTorneio = (int) ($_POST['id_torneio'] ?? 0);
        $nome = trim($_POST['nome'] ?? '');
        $integrantes = [
            trim($_POST['nick1'] ?? ''),
            trim($_POST['nick2'] ?? ''),
            trim($_POST['nick3'] ?? ''),
            trim($_POST['nick4'] ?? ''),
            trim($_POST['nick5'] ?? '')
        ];

        if ($nome == '' || in_array('', $integrantes)) {
            $_SESSION['erro'] = 'Preencha o nome da equipe e os 5 integrantes.';
            header("Location: ?p=torneio&id=$idTorneio");
            exit;
        }

        try {
            Equipe::inscrever($idTorneio, $_SESSION['id_usuario'], $nome, $integrantes);
            $_SESSION['sucesso'] = 'Equipe inscrita com sucesso.';
        } catch (Exception $e) {
            $_SESSION['erro'] = 'Nao foi possivel inscrever. Verifique se a equipe ja existe.';
        }

        header("Location: ?p=torneio&id=$idTorneio");
        exit;
    }
}
