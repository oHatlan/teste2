<?php

require_once __DIR__ . "/../Config/Banco.php";
require_once __DIR__ . "/Jogo.php";

class Torneio {
    public static function listarPorJogo($idJogo) {
        $sql = "SELECT * FROM torneios WHERE id_jogo = ? ORDER BY id DESC";
        $consulta = Banco::getConn()->prepare($sql);
        $consulta->execute([$idJogo]);
        $torneios = [];

        while ($torneio = $consulta->fetchObject()) {
            $torneios[] = $torneio;
        }

        return $torneios;
    }

    public static function listarDoUsuario($idUsuario) {
        $sql = "SELECT * FROM torneios WHERE id_usuario = ? ORDER BY id DESC";
        $consulta = Banco::getConn()->prepare($sql);
        $consulta->execute([$idUsuario]);
        $torneios = [];

        while ($torneio = $consulta->fetchObject()) {
            $jogo = Jogo::buscarPorId($torneio->id_jogo);
            $torneio->nome_jogo = $jogo->nome ?? 'Jogo';
            $torneios[] = $torneio;
        }

        return $torneios;
    }

    public static function buscarPorId($id) {
        $sql = "SELECT * FROM torneios WHERE id = ? LIMIT 1";
        $consulta = Banco::getConn()->prepare($sql);
        $consulta->execute([$id]);
        $torneio = $consulta->fetchObject();

        if ($torneio) {
            $jogo = Jogo::buscarPorId($torneio->id_jogo);
            $torneio->nome_jogo = $jogo->nome ?? 'Jogo';
        }

        return $torneio;
    }

    public static function criar($idJogo, $idUsuario, $nome, $descricao, $premiacao) {
        $sql = "INSERT INTO torneios (id_jogo, id_usuario, nome, descricao, premiacao)
                VALUES (?, ?, ?, ?, ?)";
        $consulta = Banco::getConn()->prepare($sql);
        return $consulta->execute([$idJogo, $idUsuario, $nome, $descricao, $premiacao]);
    }
}
