<?php

require __DIR__ . '/../config.php';

$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    $database->query("DELETE FROM produtos WHERE id = $id");
}

header('Location: index.php?mensagem=Produto excluído com sucesso.');
exit;
