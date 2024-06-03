<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <title>Login Administrador</title>

    <link
      rel="canonical"
      href="https://getbootstrap.com/docs/5.3/examples/headers/"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@docsearch/css@3"
    />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/color-modes.js"></script>

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
  <body class="login-container">
    <h1>Seja Bem-Vindo !</h1>
    <form action="admin-login.php" method="POST">
      <div class="mb-3">
        <label for="nome">Nome de Usuario:</label>
        <br>
        <input type="text" name="nome" />
        <label for="senha">Senha:</label>
        <br>
        <input type="password" name="senha">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Logar</button>
    </form>
  </body>
</html>
