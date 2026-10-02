<?php

require __DIR__ . '/../config.php';

$consulta = $database->query(
    'SELECT id, nome, quantidade, preco FROM produtos ORDER BY id DESC'
);

$mensagem = $_GET['mensagem'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    <header>
        <h1>Sistema de Produtos</h1>
        <a href="criar.php">Cadastrar produto</a>
    </header>

    <?php if ($mensagem !== ''): ?>
        <p><?= htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <main>
        <h2>Lista de produtos</h2>

        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($produto = $consulta->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= (int) $produto['quantidade'] ?></td>
                        <td>R$ <?= number_format((float) $produto['preco'], 2, ',', '.') ?></td>
                        <td>
                            <a href="editar.php?id=<?= (int) $produto['id'] ?>">Editar</a>
                            |
                            <a
                                href="excluir.php?id=<?= (int) $produto['id'] ?>"
                                onclick="return confirm('Deseja excluir este produto?')"
                            >Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
