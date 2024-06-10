<?php
require_once "../classes/Conexao.php";
require_once "../classes/Comentarios.php";

// Criar uma instância da classe Comentarios
$comentarios = new Comentarios();

// Obter os comentários aprovados
$comentariosAprovados = $comentarios->exibirComentariosAprovados();

// Converter para JSON
$json = json_encode($comentariosAprovados);

// Salvar o JSON em um arquivo
$file = 'comentarios_aprovados.json';
file_put_contents($file, $json);

// Redirecionar de volta para a página de administração
header("Location: index2.php");
exit;
?>
