<?php

class Seguranca {
    public static function token() {
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(random_bytes(16));
        }

        return $_SESSION['csrf'];
    }

    public static function validarCsrf() {
        $token = $_POST['csrf'] ?? '';

        if (!isset($_SESSION['csrf']) || !hash_equals($_SESSION['csrf'], $token)) {
            echo "Token CSRF invalido.";
            exit;
        }
    }
}
