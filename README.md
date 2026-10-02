# CRUD de Produtos em PHP

Exemplo educacional de CRUD usando PHP, `mysqli` e MySQL.

## Preparar o banco

1. Inicie o MySQL.
2. Execute o arquivo `database.sql` no MySQL Workbench, phpMyAdmin ou terminal.
3. Confira os dados de conexão no arquivo `config.php`.

## Executar

Abra o PowerShell na pasta do projeto:

```powershell
php -S localhost:8000
```

Depois acesse:

```text
http://localhost:8000
```

A página inicial redireciona para `produtos/index.php`. Também é possível acessar diretamente:

```text
http://localhost:8000/produtos/
```

## Estrutura

- `produtos/index.php`: lista os produtos.
- `produtos/criar.php`: cadastra um produto.
- `produtos/editar.php`: altera um produto.
- `produtos/excluir.php`: exclui um produto.
- `config.php`: faz a conexão com o MySQL.
- `database.sql`: cria a tabela e os dados iniciais.
