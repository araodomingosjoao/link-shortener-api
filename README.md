# Backend do Projeto de Encurtador de Links - Laravel

Este é o backend do projeto de encurtador de links, desenvolvido com o framework Laravel. Ele fornece a API REST para encurtar URLs, rastrear métricas de acesso e gerenciar os links encurtados.

## Pré-requisitos

Certifique-se de ter os seguintes componentes instalados em seu ambiente de desenvolvimento:

- PHP: [Download PHP](https://www.php.net/downloads.php)
- Composer: [Download Composer](https://getcomposer.org/)
- MySQL ou MariaDB: [Download MySQL](https://dev.mysql.com/downloads/) ou [Download MariaDB](https://mariadb.org/download/)

## Configuração

1. Clone o repositório do projeto:

   ```bash
   git clone https://github.com/araodomingosjoao/link-shortener-api
   ```

2. Navegue até o diretório do projeto Laravel:

   ```bash
   cd link-shortener-api
   ```

3. Instale as dependências do Composer:

   ```bash
   composer install
   ```

4. Copie o arquivo `.env.example` para `.env`:

   ```bash
   cp .env.example .env
   ```

5. Configure o arquivo `.env` com as informações do banco de dados:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome-do-banco-de-dados
   DB_USERNAME=usuario-do-banco
   DB_PASSWORD=senha-do-banco
   ```

6. Gere uma nova chave para a aplicação:

   ```bash
   php artisan key:generate
   ```

7. Execute as migrações para criar as tabelas no banco de dados:

   ```bash
   php artisan migrate
   ```

## Iniciando o Servidor

1. Inicie o servidor do Laravel:

   ```bash
   php artisan serve
   ```

O backend do Laravel agora está rodando em `http://localhost:8000`.

## Rotas da API

A API REST do backend oferece as seguintes rotas principais:

- `POST /api/links`: Cria um novo link encurtado.
- `GET /api/links`: Retorna a lista de links encurtados.original do link encurtado e registra os dados de acesso.

## Acesso à Aplicação

Acesse a API em seu navegador ou cliente de API:

- API Backend Laravel: [http://localhost:8000](http://localhost:8000)

## Observações

Certifique-se de ter o servidor do banco de dados (MySQL ou MariaDB) em execução antes de iniciar o servidor do Laravel.
