<?php
require "classes/Comentarios.php";

// Instancia a classe Comentarios
$comentarios = new Comentarios();

// Obtém a lista de comentários
$lista_comentarios = $comentarios->listar();

// Retorna a lista de comentários como JSON
echo json_encode($lista_comentarios);
?>
