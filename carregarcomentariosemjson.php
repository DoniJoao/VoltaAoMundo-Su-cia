<?php
header('Content-Type: application/json');

include_once "classes/Conexao.php";

try {
    // Conecta ao banco de dados
    $conexao = Conexao::getConnection();

    // Consulta SQL para selecionar todos os comentários aprovados
    $sql = "SELECT nome, mensagem, email, data_criacao FROM comentarios";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorna os comentários em formato JSON
    echo json_encode($comentarios);

} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao carregar os comentários: ' . $e->getMessage()]);
}
?>
