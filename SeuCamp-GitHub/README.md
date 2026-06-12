# SeuCamp

Projeto simples em PHP MVC para cadastro de torneios de jogos e inscricao de equipes.

Esta segunda postagem completa a versao inicial com edicao, exclusao, equipes e listagens finais.

## Como abrir

1. Ligue Apache e MySQL no XAMPP.
2. Acesse `http://localhost/02-postagem-final/?p=banco`.
3. Clique em `Criar banco de dados`.
4. Depois acesse `http://localhost/02-postagem-final`.

Usuarios de teste:

- `joao@email.com` / `123456`
- `maria@email.com` / `123456`

## Pastas

- `index.php`: recebe a pagina pela URL e chama o controller.
- `Config`: conexao PDO e CSRF.
- `Controller`: controla as paginas.
- `Model`: faz as consultas no banco.
- `View`: telas HTML/PHP.
- `public/css`: CSS do sistema.
- `sql/schema.sql`: banco de dados.

## Classes

- `Banco`: conexao com MySQL usando PDO.
- `Seguranca`: token CSRF.
- `Usuario`: cadastro e login.
- `Jogo`: guarda os jogos fixos do sistema.
- `Torneio`: CRUD de torneios.
- `Equipe`: inscricao de equipe.

## Tabelas

- `usuarios`
- `torneios`
- `equipes`
- `integrantes_equipe`

Os jogos nao ficam em tabela porque sao fixos no projeto. Eles estao no arquivo `Model/Jogo.php`.

## Paginas publicas

- Inicio
- Jogos
- Sobre
- Detalhe do jogo
- Detalhe do torneio

## Area logada

- Cadastrar torneio
- Editar torneio
- Excluir torneio
- Ver equipes inscritas
- Inscrever equipe em torneio
- Logout

## CRUD minimo

O CRUD principal e o de torneios:

- cadastrar
- listar/ver
- editar
- excluir

As equipes possuem cadastro e listagem para cumprir a inscricao no torneio.

## Explicacao rapida

O `index.php` pega o valor de `?p=`.
Depois chama um controller.
O controller chama uma model.
A model usa PDO para consultar o MySQL quando precisa de dados cadastrados.
A view mostra o resultado em HTML.

Os jogos sao fixos em `Model/Jogo.php`, por isso nao existe tabela de jogos no banco.
O banco e usado para usuarios, torneios, equipes e integrantes.

As consultas retornam objetos usando `fetchObject()`, que e a versao PDO parecida com `fetch_object()` do exemplo do professor.

O cookie usado no projeto e o `ultimo_jogo`, salvo quando o usuario abre a pagina de um jogo.

Nao foi criada pagina de recuperacao de senha porque o projeto foi reduzido ao minimo pedido para o tema.
