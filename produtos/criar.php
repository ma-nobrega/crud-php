<?php

require __DIR__ . '/../config.php';

$erro = '';
$nome = '';
$quantidade = '';
$preco = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $quantidade = (int) ($_POST['quantidade'] ?? 0);
    $preco = (float) str_replace(',', '.', $_POST['preco'] ?? 0);

    if ($nome === '') {
        $erro = 'Digite o nome do produto.';
    } elseif ($quantidade < 0) {
        $erro = 'A quantidade não pode ser negativa.';
    } elseif ($preco < 0) {
        $erro = 'O preço não pode ser negativo.';
    } else {
        $nomeSeguro = $database->real_escape_string($nome);

        $sql = "INSERT INTO produtos (nome, quantidade, preco)
                VALUES ('$nomeSeguro', $quantidade, $preco)";
        $database->query($sql);

        header('Location: index.php?mensagem=Produto cadastrado com sucesso.');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produto</title>
</head>
<body>
    <header>
        <h1>Cadastrar produto</h1>
        <a href="index.php">Voltar para a lista</a>
    </header>

    <main>
        <?php if ($erro !== ''): ?>
            <p><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>

        <form method="post">
            <p>
                <label for="nome">Nome</label><br>
                <input id="nome" name="nome" type="text" value="<?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>" required>
            </p>

            <p>
                <label for="quantidade">Quantidade</label><br>
                <input id="quantidade" name="quantidade" type="number" min="0" value="<?= htmlspecialchars((string) $quantidade, ENT_QUOTES, 'UTF-8') ?>" required>
            </p>

            <p>
                <label for="preco">Preço</label><br>
                <input id="preco" name="preco" type="number" min="0" step="0.01" value="<?= htmlspecialchars((string) $preco, ENT_QUOTES, 'UTF-8') ?>" required>
            </p>

            <button type="submit">Salvar</button>
        </form>
    </main>
</body>
</html>
