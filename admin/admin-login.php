<?php
require_once "../classes/usuarios.php";
require_once "../classes/conexao.php"; // Certifique-se de incluir o arquivo de conexão

// Criar uma instância da classe Usuario passando a conexão como parâmetro
$usuario = new Usuario(Conexao::getConnection());

// Processar o formulário de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    try {
        // Tentar fazer login
        $usuario->login($nome, $senha);
        // Login bem-sucedido, redirecionar para a página principal do administrador
        header("Location: index2.php");
        exit;
    } catch (Exception $e) {
        // Exibir mensagem de erro
        $erro = $e->getMessage();
    }
    var_dump($erro);
}
?>
