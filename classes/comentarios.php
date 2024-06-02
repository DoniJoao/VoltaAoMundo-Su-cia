<?php 
require "Conexao.php";
class Comentarios
{
    public $id;
    public $nome;
    public $mensagem;
    public $email;
    public $data_criacao;
    public function __construct($id = false)
    {
        if($id){
            $this->id = $id;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $sql = "SELECT * FROM comentarios WHERE id=" . $this->id;
        $conexao = Conexao::Connection();

        $resultado = $conexao->query($sql);

        $linha = $resultado->fetch();

        $this->id = $linha['id'];
        $this->nome = $linha['img_cartaz'];
        $this->mensagem = $linha['titulo'];
        $this->data_criacao = $linha['sinopse'];
    }

    public function listar()
    {
        $sql = "SELECT a.id, a.nome, a.mensagem, a.data_criacao
            FROM comentarios ORDER BY a.id";
            
        $conexao = Conexao::Connection();
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;


    } 

    public function excluir()
    {
        $this->carregar();

        $sql = "DELETE FROM comentarios
        WHERE id=" . $this->id;

        $conexao = Conexao::Connection();
        
        $conexao->exec($sql);
    }

}
?>