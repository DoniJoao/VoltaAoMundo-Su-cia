<?php
class Comentarios
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function obterTodos()
    {
        $sql = "SELECT * FROM comentarios ORDER BY data_criacao DESC";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function aprovar($id)
    {
        $sql = "UPDATE comentarios SET aprovado = 1 WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function exibirComentariosAprovados()
{
    $sql = "SELECT * FROM comentarios WHERE aprovado = 1";
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $json = json_encode($resultados);

    file_put_contents('comentarios.json', $json);

    return $json;
}
}
?>
