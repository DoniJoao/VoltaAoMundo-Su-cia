<?php require_once '../admin-verifica.php'; ?>

<?php 
    require_once "../classes/comentarios.php";
    $filme = new  $comentarios();
    $lista = $comentarios->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volta ao Mundo - Suécia</title>
</head>
<body>
    <session>
        <h1>Comentarios</h1>
        <br>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Mensagem</th>
                <th>Data e Hora</th>
            </tr>
            <?php foreach ( $lista as $linha) : ?>
            <tr>
                <td><?php echo $linha['id'] ?></td>
                <td><?php echo $linha ['nome']?></td>
                <td><?php echo $linha ['mensagem'] ?></td>
                <td><?php echo $linha ['data_ciracao'] ?></td>
                <td><?php echo $linha ['aprovado'] ?></td>
                    <a href="./comentario-excluir.php">Deletar</a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
        <br><br>
        <a href="../index2.php">Voltar a Pagina Principal</a>
        <a href="../admin-logout.php">Sair</a>
    </session>
</body>
</html>