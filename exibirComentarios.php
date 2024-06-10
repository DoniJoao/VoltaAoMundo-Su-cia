<?php
require "classes/comentarios.php";

// Crie uma instância da classe Comentarios
$comentarios = new Comentarios();

// Obtenha a lista de comentários
$lista_comentarios = $comentarios->listar();

// Verifique se existem comentários
if ($lista_comentarios) {
    // Retorne a lista de comentários como JSON
    echo json_encode($lista_comentarios);
} else {
    // Se não houver comentários, retorne um array vazio como JSON
    echo json_encode([]);
}
?>
