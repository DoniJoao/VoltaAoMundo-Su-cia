<?php
try {
    // Inclui a conexão com o banco de dados
    include_once "classes/conexao.php";

    // Captura e sanitiza os dados do formulário
    $nome = isset($_POST["nome"]) ? htmlspecialchars($_POST["nome"], ENT_QUOTES, 'UTF-8') : null;
    $mensagem = isset($_POST["mensagem"]) ? htmlspecialchars($_POST["mensagem"], ENT_QUOTES, 'UTF-8') : null;
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8') : null;

    // Verifica se todos os campos necessários foram preenchidos
    if (empty($nome) || empty($mensagem) || empty($email)) {
        throw new Exception("Todos os campos são obrigatórios.");
    }

    // Cria a data atual no formato 'Y-m-d'
    $now = new DateTime();
    $date = $now->format('Y-m-d H:i:s');

    // Prepara a declaração SQL usando placeholders
    $sql = "INSERT INTO comentarios (nome, mensagem, email, data_criacao) VALUES (:nome, :mensagem, :email, :data_criacao)";
    $stmt = $conexao->prepare($sql);

    // Verifica se a preparação foi bem-sucedida
    if ($stmt === false) {
        throw new Exception("Erro na preparação da declaração: " . $conexao->errorInfo()[2]);
    }

    // Associa os valores aos placeholders
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':mensagem', $mensagem);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':data_criacao', $date);

    // Executa a declaração SQL
    if ($stmt->execute() === false) {
        throw new Exception("Erro na execução da declaração: " . $stmt->errorInfo()[2]);
    }

    echo "<h3>Comentário enviado com sucesso! Obrigado pela colaboração.</h3>";
    echo "<a href='index.html'>Voltar para a Página Inicial</a>";

    // Fechar a conexão
    $conexao = null;
} catch (Exception $erro) {
    // Exibe a mensagem de erro para depuração
    echo "Erro: " . $erro->getMessage();
    echo "<br>Ocorreu um erro. Por favor, tente novamente mais tarde.";
}
?>
