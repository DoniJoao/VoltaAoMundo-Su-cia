<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump(__DIR__ . "/../classes/usuarios.php");
    require_once "../classes/conexao.php";

    $nome = $_POST["nome"] ?? "";
    $senha = $_POST["senha"] ?? "";

    try {
        $conexao = Conexao::getConnection();
        $usuario = new Usuarios($conexao);

        if ($usuario->login($nome, $senha)) {
            $_SESSION["usuario"] = $nome;
            header("Location: index2.php");
            exit;
        } else {
            $erro = "Nome de usuário ou senha incorretos.";
        }
    } catch (Exception $e) {
        $erro = "Erro: " . $e->getMessage();
    }
} else {
    $erro = "Por favor, preencha todos os campos.";
}
?>
