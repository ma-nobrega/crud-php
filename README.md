# CRUD de Produtos em PHP

Exemplo educacional de CRUD usando PHP, `mysqli` e MySQL. O projeto está sem CSS de propósito para que os alunos possam construir a aparência.

## Preparar o banco

1. Abra o MySQL Workbench, phpMyAdmin ou o terminal do MySQL.
2. Execute o arquivo `database.sql`.
3. Confira os dados de conexão no início do arquivo `config.php`.

## Executar

Dentro da pasta do projeto:

```bash
php -S localhost:8000
```

Depois acesse <http://localhost:8000>.

## Como estudar o projeto

- `index.php`: usa `SELECT` para listar produtos.
- `criar.php`: usa `INSERT` para cadastrar.
- `editar.php`: usa `SELECT` e `UPDATE` para alterar.
- `excluir.php`: usa `DELETE` para excluir.
- `config.php`: faz a conexão com o MySQL usando `mysqli`.

Os comentários explicam os momentos principais do fluxo, sem comentar cada linha. O código usa SQL direto para deixar o primeiro contato mais fácil. Em um sistema real, prefira consultas preparadas com `prepare` e `bind_param`.
