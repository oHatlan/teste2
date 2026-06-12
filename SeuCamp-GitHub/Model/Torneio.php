<?php

require_once __DIR__ . "/../Config/Banco.php";
require_once __DIR__ . "/Jogo.php";

class Torneio {
    public static function listarPorJogo($idJogo) {
        $sql = "SELECT torneios.*,
                       (SELECT COUNT(*) FROM equipes WHERE equipes.id_torneio = torneios.id) AS total_equipes
                FROM torneios
                WHERE torneios.id_jogo = ?
                ORDER BY torneios.id DESC";

        $consulta = Banco::getConn()->prepare($sql);
        $consulta->execute([$idJogo]);
        $torneios = [];

        while ($torneio = $consulta->fetchObject()) {
            $jogo = Jogo::buscarPorId($torneio->id_jogo);
            $torneio->nome_jogo = $jogo->nome ?? 'Jogo';
            $torneios[] = $torneio;
        }

        return $torneios;
    }

    public static function listarDoUsuario($idUsuario) {
        $sql = "SELECT torneios.*,
                       (SELECT COUNT(*) FROM equipes WHERE equipes.id_torneio = torneios.id) AS total_equipes
                FROM torneios
                WHERE torneios.id_usuario = ?
                ORDER BY torneios.id DESC";

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
        $sql = "SELECT torneios.*,
                       (SELECT COUNT(*) FROM equipes WHERE equipes.id_torneio = torneios.id) AS total_equipes
                FROM torneios
                WHERE torneios.id = ?
                LIMIT 1";

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

    public static function atualizar($id, $idUsuario, $nome, $descricao, $premiacao) {
        $sql = "UPDATE torneios
                SET nome = ?, descricao = ?, premiacao = ?
                WHERE id = ? AND id_usuario = ?";
        $consulta = Banco::getConn()->prepare($sql);
        return $consulta->execute([$nome, $descricao, $premiacao, $id, $idUsuario]);
    }

    public static function excluir($id, $idUsuario) {
        $sql = "DELETE FROM torneios WHERE id = ? AND id_usuario = ?";
        $consulta = Banco::getConn()->prepare($sql);
        return $consulta->execute([$id, $idUsuario]);
    }
}
