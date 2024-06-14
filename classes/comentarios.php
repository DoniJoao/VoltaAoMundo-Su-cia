<?php
require_once "Conexao.php";
class Comentarios
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConnection();
    }

    public function exibirComentarios()
    {
        $sql = "SELECT * FROM comentarios";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function aprovarComentario($id)
    {
        $sql = "UPDATE comentarios SET aprovado = 1 WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function reprovarComentario($id)
    {
        $sql = "UPDATE comentarios SET aprovado = 0 WHERE id = :id";
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

    // Convertendo os resultados em uma string JSON
    $json = json_encode($resultados);

    // Salvando o JSON em um arquivo
    file_put_contents('comentarios.json', $json);

    return $json;
}
}
?>
