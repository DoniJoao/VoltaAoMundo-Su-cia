<?php
session_start();
require_once '../classes/usuarios.php';

$usuarios = new Usuarios();

if (isset($_POST['nome']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    
    if ($usuarios->login($nome, $senha)) {
        $_SESSION['admin'] = true;
        header("Location: index2.php");
    } else {
        header("Location: login.html");
    }
} else {
    header("Location: login.html");
}
?>