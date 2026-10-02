<?php

/*
 * Este arquivo concentra a conexão com o banco.
 * As outras páginas usam require para reaproveitar esta conexão.
 * Altere apenas os quatro valores abaixo quando necessário.
 */
$database = new mysqli('localhost', 'root', 'root', 'crud_produtos');

if ($database->connect_error) {
    die('Erro ao conectar ao MySQL: ' . $database->connect_error);
}

// utf8mb4 permite salvar corretamente acentos e outros caracteres.
$database->set_charset('utf8mb4');
