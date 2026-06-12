# SeuCamp - primeira postagem

Primeira versao do projeto SeuCamp em PHP MVC.

Esta etapa deixa pronta a base do sistema:

- estrutura MVC simples;
- paginas publicas;
- listagem de jogos fixos;
- cadastro e login de usuarios;
- cadastro e listagem simples de torneios;
- conexao com MySQL usando PDO;
- sessoes;
- cookie de ultimo jogo acessado;
- protecao CSRF nos formularios.

## Como abrir

1. Ligue Apache e MySQL no XAMPP.
2. Acesse `http://localhost/01-postagem-base/?p=banco`.
3. Clique em `Criar banco de dados`.
4. Depois acesse `http://localhost/01-postagem-base`.

Usuarios de teste:

- `joao@email.com` / `123456`
- `maria@email.com` / `123456`

## Pastas

- `index.php`: recebe a pagina pela URL e chama o controller.
- `Config`: conexao PDO e CSRF.
- `Controller`: controla as paginas.
- `Model`: guarda as regras simples de dados.
- `View`: telas HTML/PHP.
- `public/css`: CSS do sistema.
- `sql/schema.sql`: banco de dados.

## Classes

- `Banco`: conexao com MySQL usando PDO.
- `Seguranca`: token CSRF.
- `Usuario`: cadastro e login.
- `Jogo`: guarda os jogos fixos do sistema.
- `Torneio`: cadastro e consulta simples de torneios.

## Tabelas

- `usuarios`
- `torneios`

Os jogos nao ficam em tabela porque sao fixos no projeto. Eles estao no arquivo `Model/Jogo.php`.

## Paginas

- Inicio
- Jogos
- Sobre
- Detalhe do jogo
- Cadastro de torneio
- Meus torneios
- Detalhe do torneio
- Login
- Cadastro

## Observacao

Esta primeira postagem representa a base inicial com cadastro e consulta de torneios. A edicao, exclusao e inscricao de equipes entram na segunda postagem.
