<?php

require 'config.php';

$id = (int) ($_GET['id'] ?? 0);

/*
 * EDIÇÃO - PRIMEIRA ETAPA:
 * Recebemos o id pela URL e buscamos o produto para preencher o formulário.
 * O cast para int impede que o id seja tratado como texto no SQL.
 */
$resultado = $database->query("SELECT * FROM produtos WHERE id = $id");
$produto = $resultado->fetch_assoc();

if (!$produto) {
    die('Produto não encontrado.');
}

$erro = '';
$nome = $produto['nome'];
$quantidade = $produto['quantidade'];
$preco = $produto['preco'];

/*
 * EDIÇÃO - SEGUNDA ETAPA:
 * Quando o formulário é enviado, UPDATE altera a linha encontrada pelo id.
 */
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

        $sql = "UPDATE produtos
                SET nome = '$nomeSeguro', quantidade = $quantidade, preco = $preco
                WHERE id = $id";
        $database->query($sql);

        header('Location: index.php?mensagem=Produto atualizado com sucesso.');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
</head>
<body>
    <header>
        <h1>Editar produto</h1>
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
                <input id="quantidade" name="quantidade" type="number" min="0" value="<?= (int) $quantidade ?>" required>
            </p>

            <p>
                <label for="preco">Preço</label><br>
                <input id="preco" name="preco" type="number" min="0" step="0.01" value="<?= htmlspecialchars((string) $preco, ENT_QUOTES, 'UTF-8') ?>" required>
            </p>

            <button type="submit">Salvar alterações</button>
        </form>
    </main>
</body>
</html>
