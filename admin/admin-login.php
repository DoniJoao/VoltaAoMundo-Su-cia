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
        $usuario = new Usuario($conexao);

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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login Administrador</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 15px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        label {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="login-title">Seja Bem Vindo!</h1>
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($erro); ?></div>
        <?php endif; ?>
        <form action="admin-login.php" method="POST">
            <div class="mb-3">
                <label for="nome">Nome de Usuario:</label>
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
</body>
</html>
