<?php
session_start(); // Iniciar a sessão (se ainda não estiver iniciada)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conexao.php"; // Inclua o arquivo de conexão ao banco de dados
    
    // Capturar os dados do formulário
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Criar um objeto usuário e tentar fazer login
    $usuario = new Usuario();
    $usuario->nome = $nome;
    $usuario->senha = $senha;
    
    try {
        $usuario->login(); // Tentar realizar o login
        $_SESSION['nome'] = $nome; // Armazenar o nome do usuário na sessão

        // Redirecionar para a página index2.php após o login
        header("Location: index2.php");
        exit;
    } catch (Exception $e) {
        // Tratamento de erro
        header("Location: admin-erro.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login Administrador</title>
    <link rel="icon" href="../imagens/favicon-32x32.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
</head>
<body class="container">
    
    <div class="login-container">
        <h1 class="login-title">Seja Bem Vindo !</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
                <label for="nome">Nome de Usuário:</label>
                <br>
                <input type="text" name="nome" id="nome" required />
            </div>
            <div class="mb-3">
                <label for="senha">Senha:</label>
                <br>
                <input type="password" name="senha" id="senha" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Logar</button>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
