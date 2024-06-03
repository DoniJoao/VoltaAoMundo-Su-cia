<?php
require "Conexao.php";

// Obtém uma conexão PDO
$conexao = Conexao::getConnection();

// Agora você pode usar $conexao para executar consultas no banco de dados
?>


class Comentarios
{
    // Propriedades da classe
    public $id;
    public $nome;
    public $mensagem;
    public $email;
    public $data_criacao;
    public $aprovado; // Adiciona a propriedade para armazenar o status de aprovação

    // Construtor da classe
    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    // Método para carregar um comentário específico
    public function carregar()
    {
        $sql = "SELECT * FROM comentarios WHERE id=" . $this->id;
        $conexao = Conexao::Connection();
        $resultado = $conexao->query($sql);
        $linha = $resultado->fetch();

        // Preenche as propriedades com os valores do banco de dados
        $this->id = $linha['id'];
        $this->nome = $linha['nome'];
        $this->mensagem = $linha['mensagem'];
        $this->email = $linha['email'];
        $this->data_criacao = $linha['data_criacao'];
        $this->aprovado = $linha['aprovado']; // Define o status de aprovação
    }

    // Método para listar todos os comentários
    public function listar()
    {
        $sql = "SELECT * FROM comentarios ORDER BY data_criacao";
        $conexao = Conexao::Connection();
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    // Método para aprovar um comentário
    public function aprovar()
    {
        $this->aprovado = 1; // Define o status de aprovação como aprovado

        // Atualiza o registro no banco de dados
        $sql = "UPDATE comentarios SET aprovado = :aprovado WHERE id = :id";
        $conexao = Conexao::Connection();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':aprovado', $this->aprovado);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }

    // Método para reprovar um comentário
    public function reprovar()
    {
        $this->aprovado = 0; // Define o status de aprovação como reprovado

        // Atualiza o registro no banco de dados
        $sql = "UPDATE comentarios SET aprovado = :aprovado WHERE id = :id";
        $conexao = Conexao::Connection();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':aprovado', $this->aprovado);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }

    // Método para excluir um comentário
    public function excluir()
    {
        $sql = "DELETE FROM comentarios WHERE id=" . $this->id;
        $conexao = Conexao::Connection();
        $conexao->exec($sql);
    }
}
?>
