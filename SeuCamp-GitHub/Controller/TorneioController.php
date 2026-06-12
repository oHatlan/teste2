<?php

require_once __DIR__ . "/../Model/Torneio.php";
require_once __DIR__ . "/../Model/Jogo.php";
require_once __DIR__ . "/../Model/Equipe.php";

class TorneioController {
    public static function ver() {
        $id = (int) ($_GET['id'] ?? 0);
        $torneio = Torneio::buscarPorId($id);

        if (!$torneio) {
            $_SESSION['erro'] = 'Torneio nao encontrado.';
            header("Location: ?p=jogos");
            exit;
        }

        $equipes = Equipe::listarPorTorneio($id);
        require __DIR__ . "/../View/torneio.php";
    }

    public static function meus() {
        $torneios = Torneio::listarDoUsuario($_SESSION['id_usuario']);
        require __DIR__ . "/../View/meus_torneios.php";
    }

    public static function novo() {
        $idJogo = (int) ($_GET['id_jogo'] ?? 0);
        $jogo = Jogo::buscarPorId($idJogo);

        if (!$jogo) {
            $_SESSION['erro'] = 'Escolha um jogo para cadastrar o torneio.';
            header("Location: ?p=jogos");
            exit;
        }

        $torneio = null;
        $acao = "?p=salvar-torneio";
        $titulo = "Novo torneio";
        require __DIR__ . "/../View/form_torneio.php";
    }

    public static function salvar() {
        Seguranca::validarCsrf();

        $idJogo = (int) ($_POST['id_jogo'] ?? 0);
        $nome = trim($_POST['nome'] ?? '');
        $descricao = trim($_POST['descricao'] ?? '');
        $premiacao = trim($_POST['premiacao'] ?? '');

        if ($nome == '' || $descricao == '') {
            $_SESSION['erro'] = 'Preencha nome e descricao.';
            header("Location: ?p=novo-torneio&id_jogo=$idJogo");
            exit;
        }

        Torneio::criar($idJogo, $_SESSION['id_usuario'], $nome, $descricao, $premiacao);
        $_SESSION['sucesso'] = 'Torneio cadastrado com sucesso.';
        header("Location: ?p=jogo&id=$idJogo");
        exit;
    }

    public static function editar() {
        $id = (int) ($_GET['id'] ?? 0);
        $torneio = Torneio::buscarPorId($id);

        if (!$torneio || $torneio->id_usuario != $_SESSION['id_usuario']) {
            $_SESSION['erro'] = 'Voce so pode editar seus torneios.';
            header("Location: ?p=meus-torneios");
            exit;
        }

        $jogo = Jogo::buscarPorId($torneio->id_jogo);
        $acao = "?p=atualizar-torneio";
        $titulo = "Editar torneio";
        require __DIR__ . "/../View/form_torneio.php";
    }

    public static function atualizar() {
        Seguranca::validarCsrf();

        $id = (int) ($_POST['id'] ?? 0);
        $nome = trim($_POST['nome'] ?? '');
        $descricao = trim($_POST['descricao'] ?? '');
        $premiacao = trim($_POST['premiacao'] ?? '');

        if ($nome == '' || $descricao == '') {
            $_SESSION['erro'] = 'Preencha nome e descricao.';
            header("Location: ?p=editar-torneio&id=$id");
            exit;
        }

        Torneio::atualizar($id, $_SESSION['id_usuario'], $nome, $descricao, $premiacao);
        $_SESSION['sucesso'] = 'Torneio atualizado.';
        header("Location: ?p=meus-torneios");
        exit;
    }

    public static function excluir() {
        Seguranca::validarCsrf();

        $id = (int) ($_POST['id'] ?? 0);
        Torneio::excluir($id, $_SESSION['id_usuario']);
        $_SESSION['sucesso'] = 'Torneio excluido.';
        header("Location: ?p=meus-torneios");
        exit;
    }
}
