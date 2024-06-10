<?php
// index2.php

session_start();
include_once "../classes/comentarios.php";
include_once "../classes/usuarios.php";

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin-login.php");
    exit;
}

// Criar uma instância da classe Comentarios
$comentarios = new Comentarios();

// Processar aprovação/reprovação
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['aprovar'])) {
        $comentarios->aprovarComentario($_POST['id']);
    } elseif (isset($_POST['reprovar'])) {
        $comentarios->reprovarComentario($_POST['id']);
    }
}

// Obter todos os comentários
$comentariosLista = $comentarios->exibirComentarios();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Administração - Comentários</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Administração de Comentários</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Mensagem</th>
                    <th>Email</th>
                    <th>Data de Criação</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comentariosLista as $comentario): ?>
                <tr>
                    <td><?php echo htmlspecialchars($comentario['nome']); ?></td>
                    <td><?php echo htmlspecialchars($comentario['mensagem']); ?></td>
                    <td><?php echo htmlspecialchars($comentario['email']); ?></td>
                    <td><?php echo htmlspecialchars($comentario['data_criacao']); ?></td>
                    <td>
                        <?php if ($comentario['aprovado'] == 0): ?>
                            <form action="index2.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $comentario['id']; ?>">
                                <button type="submit" name="aprovar" class="btn btn-success btn-sm">Aprovar</button>
                            </form>
                            <form action="index2.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $comentario['id']; ?>">
                                <button type="submit" name="reprovar" class="btn btn-danger btn-sm">Reprovar</button>
                            </form>
                        <?php else: ?>
                            <span class="badge bg-success">Aprovado</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form action="exportarComentarios.php" method="post">
            <button type="submit" class="btn btn-primary">Exportar Comentários Aprovados</button>
        </form>
    </div>

    <!-- Bootstrap JS (opcional, se você precisar de funcionalidades do Bootstrap JavaScript) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
