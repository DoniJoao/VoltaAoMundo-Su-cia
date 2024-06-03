<?php 
    $usuario = $_POST["usuario"];

    $sql = "SELECT * FROM usuario 
            WHERE usuario ='{$usuario}'";

include "classes/conexao.php";

$conexao = Conexao::getConnection();
$resultado = $conexao->query($sql);
$linha = $resultado->fetch();
$usuario_logado = $linha['usuario'];

if ($usuario_logado == null) {
    header('Location: admin-erro.php');
}
else {
    session_start();
    $_SESSION['usuario_logado'] = $usuario_logado;
    header('Location: index2.php');
}
?>

