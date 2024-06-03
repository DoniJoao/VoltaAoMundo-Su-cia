<?php
require "classes/comentarios.php";

// Instancia a classe Comentarios
$comentarios = new $comentarios();

// Obtém a lista de comentários
$lista_comentarios = $comentarios->listar();

// Retorna a lista de comentários como JSON
echo json_encode($lista_comentarios);
