# Projeto PHP/Laravel Task Manager

Este projeto é um exemplo simples desenvolvido em PHP, Laravel, MariaDB para fins de aprendizado, com foco em gerenciamento de tarefas.

## Funcionalidades

-   **Criar usuário:** Cadastro de novos usuários no sistema.
-   **Login:** Autenticação de usuários registrados.
-   **Criar task:** Permite adicionar novas tarefas.
-   **Editar task:** Possibilita modificar tarefas existentes.
-   **Deletar task:** Remove tarefas do sistema.

## Como usar

1.  Clone o repositório:
    ```bash
    git clone <url-do-repositorio>
    ```
2.  Acesse a pasta do projeto:

    ```bash
    cd task-manager-laravel-app
    ```

3.  Renomeie o arquivo '.env.example' para '.env' e atualize as credenciais de conexão com o banco.

4.  Instale as dependências do projeto:

    ```bash
    composer install
    ```

5.  Execute as migrações e os seeders para criar e popular as tabelas do banco de dados:

    ```bash
    php artisan migrate --seed
    ```

6.  Por padrão, o sistema cria via seed um usuário inicial com as seguintes credenciais:

        - **Usuário:** admin
        - **Senha:** password

7.  Inicie o servidor:
    ```bash
    php artisan serve
    ```

## Requisitos

-   PHP 8.2.28 ou superior
-   Laravel Installer 5.15.0
-   Composer version 2.2.0
-   MySQL ou MariaDB

## Contribuição

Sinta-se à vontade para abrir issues ou enviar pull requests com melhorias, correções ou novas funcionalidades.
