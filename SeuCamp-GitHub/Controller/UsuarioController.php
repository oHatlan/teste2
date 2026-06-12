<?php

require_once __DIR__ . "/../Model/Usuario.php";

class UsuarioController {
    public static function login() {
        if (isset($_SESSION['id_usuario'])) {
            header("Location: ?p=jogos");
            exit;
        }

        require __DIR__ . "/../View/login.php";
    }

    public static function entrar() {
        Seguranca::validarCsrf();

        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';

        $usuario = Usuario::buscarPorEmail($email);

        if ($usuario && password_verify($senha, $usuario->senha)) {
            $_SESSION['id_usuario'] = $usuario->id;
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;

            header("Location: ?p=jogos");
            exit;
        }

        $_SESSION['erro'] = 'Email ou senha incorretos.';
        header("Location: ?p=login");
        exit;
    }

    public static function cadastro() {
        require __DIR__ . "/../View/cadastro.php";
    }

    public static function cadastrar() {
        Seguranca::validarCsrf();

        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';

        if ($nome == '' || $email == '' || strlen($senha) < 6) {
            $_SESSION['erro'] = 'Preencha nome, email e senha com pelo menos 6 caracteres.';
            header("Location: ?p=cadastro");
            exit;
        }

        if (Usuario::buscarPorEmail($email)) {
            $_SESSION['erro'] = 'Este email ja esta cadastrado.';
            header("Location: ?p=cadastro");
            exit;
        }

        Usuario::criar($nome, $email, $senha);
        $_SESSION['sucesso'] = 'Cadastro realizado. Agora faca login.';
        header("Location: ?p=login");
        exit;
    }

    public static function logout() {
        session_destroy();
        header("Location: ?p=inicio");
        exit;
    }
}
