<?php

require_once __DIR__ . "/../Config/Banco.php";

class Usuario {
    public static function criar($nome, $email, $senha) {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $consulta = Banco::getConn()->prepare($sql);
        return $consulta->execute([$nome, $email, password_hash($senha, PASSWORD_DEFAULT)]);
    }

    public static function buscarPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
        $consulta = Banco::getConn()->prepare($sql);
        $consulta->execute([$email]);
        return $consulta->fetchObject();
    }

    public static function buscarPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = ? LIMIT 1";
        $consulta = Banco::getConn()->prepare($sql);
        $consulta->execute([$id]);
        return $consulta->fetchObject();
    }
}
