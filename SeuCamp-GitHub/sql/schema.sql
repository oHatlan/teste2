CREATE DATABASE IF NOT EXISTS seucamp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE seucamp;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS torneios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_jogo INT NOT NULL,
    id_usuario INT NOT NULL,
    nome VARCHAR(120) NOT NULL,
    descricao TEXT NOT NULL,
    premiacao VARCHAR(120) DEFAULT '',
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);

INSERT IGNORE INTO usuarios (id, nome, email, senha) VALUES
(1, 'Joao Silva', 'joao@email.com', '$2y$10$Einq8CBpTo45f8tVwGukwuwZB0ZRjlGko7Afb5GCQKS9120McHZSq'),
(2, 'Maria Souza', 'maria@email.com', '$2y$10$Einq8CBpTo45f8tVwGukwuwZB0ZRjlGko7Afb5GCQKS9120McHZSq');

INSERT IGNORE INTO torneios (id, id_jogo, id_usuario, nome, descricao, premiacao) VALUES
(1, 1, 1, 'Copa SeuCamp LoL', 'Torneio inicial de League of Legends.', 'R$ 500,00'),
(2, 2, 2, 'Desafio Valorant', 'Campeonato simples de Valorant.', 'Medalhas');
