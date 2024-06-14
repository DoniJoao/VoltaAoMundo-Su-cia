<?php
require "classes/comentarios.php";

// Crie uma instância da classe Comentarios
$comentarios = new Comentarios();

// Obtenha a lista de comentários aprovados
$lista_comentarios = $comentarios->exibirComentariosAprovados();

// Verifique se existem comentários
if ($lista_comentarios) {
    // Converta a lista de comentários para JSON
    $json_comentarios = json_encode($lista_comentarios);
    echo $json_comentarios;
} else {
    // Se não houver comentários, retorne um array vazio como JSON
    echo json_encode([]);
}
?>
