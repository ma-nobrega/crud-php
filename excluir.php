<?php

require 'config.php';

/*
 * EXCLUSÃO:
 * O link da listagem envia o id pela URL.
 * DELETE remove a linha correspondente a esse id.
 * A confirmação aparece antes, no link da página index.php.
 */
$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    $database->query("DELETE FROM produtos WHERE id = $id");
}

header('Location: index.php?mensagem=Produto excluído com sucesso.');
exit;
