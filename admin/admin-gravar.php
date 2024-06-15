<?php 

include_once "classes/conexao.php";
$conexao->exec($sql);
echo "<h3>Registro gravado com sucesso!</h3>";
header('Location: index2.php');

?>