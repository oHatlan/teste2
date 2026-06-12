<?php

require_once __DIR__ . "/../Model/Jogo.php";

class HomeController {
    public static function inicio() {
        $jogos = Jogo::listarTodos();
        require __DIR__ . "/../View/inicio.php";
    }

    public static function sobre() {
        require __DIR__ . "/../View/sobre.php";
    }
}
