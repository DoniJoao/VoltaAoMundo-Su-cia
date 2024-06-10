<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir novo administrador</title>
</head>
<body>
    <h3>Novo Admin</h3>
    <form action="admin-gravar.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario">
        <br><br>
        <label for="senha">senha:</label>
        <input type="password" name="senha">
        <br><br>
        <input type="submit" value="Gravar">
    </form>
</body>
</html>