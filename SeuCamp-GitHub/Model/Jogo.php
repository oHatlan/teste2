<?php

class Jogo {
    public static function dadosFixos() {
        return [
            (object) [
                'id' => 1,
                'nome' => 'League of Legends',
                'descricao' => 'Jogo de estrategia em equipes com partidas competitivas.',
                'imagem' => 'public/img/league-of-legends.jpg'
            ],
            (object) [
                'id' => 2,
                'nome' => 'Valorant',
                'descricao' => 'Jogo de tiro tatico em equipes com agentes e habilidades.',
                'imagem' => 'public/img/valorant.webp'
            ],
            (object) [
                'id' => 3,
                'nome' => 'Counter-Strike 2',
                'descricao' => 'Jogo de tiro competitivo em equipes, com partidas entre terroristas e contra-terroristas.',
                'imagem' => 'public/img/counter-strike-2.jpg'
            ]
        ];
    }

    public static function listarTodos() {
        return self::dadosFixos();
    }

    public static function buscarPorId($id) {
        foreach (self::dadosFixos() as $jogo) {
            if ($jogo->id == $id) {
                return $jogo;
            }
        }

        return null;
    }
}
