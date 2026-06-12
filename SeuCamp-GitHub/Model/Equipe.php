<?php

require_once __DIR__ . "/../Config/Banco.php";
require_once __DIR__ . "/Jogo.php";

class Equipe {
    public static function inscrever($idTorneio, $idUsuario, $nome, $integrantes) {
        $conn = Banco::getConn();

        try {
            $conn->beginTransaction();

            $sql = "INSERT INTO equipes (id_torneio, id_usuario, nome) VALUES (?, ?, ?)";
            $consulta = $conn->prepare($sql);
            $consulta->execute([$idTorneio, $idUsuario, $nome]);

            $idEquipe = $conn->lastInsertId();

            $sqlIntegrante = "INSERT INTO integrantes_equipe (id_equipe, nick) VALUES (?, ?)";
            $consultaIntegrante = $conn->prepare($sqlIntegrante);

            foreach ($integrantes as $nick) {
                $consultaIntegrante->execute([$idEquipe, $nick]);
            }

            $conn->commit();
            return true;
        } catch (Exception $e) {
            if ($conn->inTransaction()) {
                $conn->rollBack();
            }

            throw $e;
        }
    }

    public static function listarPorTorneio($idTorneio) {
        $sql = "SELECT equipes.*, usuarios.nome AS nome_usuario,
                       (SELECT GROUP_CONCAT(nick SEPARATOR ', ')
                        FROM integrantes_equipe
                        WHERE integrantes_equipe.id_equipe = equipes.id) AS integrantes
                FROM equipes
                JOIN usuarios ON usuarios.id = equipes.id_usuario
                WHERE equipes.id_torneio = ?
                ORDER BY equipes.nome";

        $consulta = Banco::getConn()->prepare($sql);
        $consulta->execute([$idTorneio]);
        $equipes = [];

        while ($equipe = $consulta->fetchObject()) {
            $equipes[] = $equipe;
        }

        return $equipes;
    }

    public static function listarPorUsuario($idUsuario) {
        $sql = "SELECT equipes.*, torneios.nome AS nome_torneio, torneios.id_jogo
                FROM equipes
                JOIN torneios ON torneios.id = equipes.id_torneio
                WHERE equipes.id_usuario = ?
                ORDER BY equipes.id DESC";

        $consulta = Banco::getConn()->prepare($sql);
        $consulta->execute([$idUsuario]);
        $equipes = [];

        while ($equipe = $consulta->fetchObject()) {
            $jogo = Jogo::buscarPorId($equipe->id_jogo);
            $equipe->nome_jogo = $jogo->nome ?? 'Jogo';
            $equipes[] = $equipe;
        }

        return $equipes;
    }
}
