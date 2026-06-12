<?php

session_start();

require "Config/Seguranca.php";
require "Controller/HomeController.php";
require "Controller/UsuarioController.php";
require "Controller/JogoController.php";
require "Controller/TorneioController.php";
require "Controller/EquipeController.php";

$pagina = $_GET['p'] ?? 'inicio';

$publicas = [
    'inicio',
    'jogos',
    'jogo',
    'sobre',
    'torneio',
    'login',
    'entrar',
    'cadastro',
    'cadastrar',
    'banco'
];

if (!isset($_SESSION['id_usuario']) && !in_array($pagina, $publicas)) {
    header("Location: ?p=login");
    exit;
}

match ($pagina) {
    'inicio'            => HomeController::inicio(),
    'sobre'             => HomeController::sobre(),

    'login'             => UsuarioController::login(),
    'entrar'            => UsuarioController::entrar(),
    'cadastro'          => UsuarioController::cadastro(),
    'cadastrar'         => UsuarioController::cadastrar(),
    'logout'            => UsuarioController::logout(),

    'jogos'             => JogoController::listar(),
    'jogo'              => JogoController::ver(),

    'torneio'           => TorneioController::ver(),
    'meus-torneios'     => TorneioController::meus(),
    'novo-torneio'      => TorneioController::novo(),
    'salvar-torneio'    => TorneioController::salvar(),
    'editar-torneio'    => TorneioController::editar(),
    'atualizar-torneio' => TorneioController::atualizar(),
    'excluir-torneio'   => TorneioController::excluir(),

    'equipes'           => EquipeController::minhas(),
    'inscrever-equipe'  => EquipeController::inscrever(),

    'banco'             => require "criar-banco.php",

    default             => HomeController::inicio(),
};
