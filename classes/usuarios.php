<?php
class Usuario
{
  public $nome;
  public $senha;

  public function __construct($id = false)
  {
    if ($id) {
      $this->id = $id;
      $this->carregar();
    }
  }

  public function inserir()
  {
    include "conexao.php";

    $sql = "INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)";

    $resultado = $conexao->prepare($sql);
    $resultado->bindParam(':nome', $this->nome);
    $resultado->bindParam(':senha', $this->senha);
    $resultado->execute();
  }

  public function login()
  {
    include "classes/conexao.php";

    $senha = hash("sha256", $this->senha);

    $sql = "SELECT * FROM usuarios
        WHERE nome = :nome
        AND senha = :senha";

    $resultado = $conexao->prepare($sql);
    $resultado->bindParam(':nome', $this->nome);
    $resultado->bindParam(':senha', $senha);
    $linha = $resultado->execute();

    $linha = $resultado->fetch();
    $this->email = $linha['nome'];
    $this->senha = $linha['senha'];
  }

  public function excluir()
  {
    $sql = "DELETE FROM usuarios WHERE id=" . $this->id;

    include "conexao.php";

    $conexao->exec($sql);
  }

  public function carregar()
  {
    $sql = "SELECT * FROM usuarios WHERE id=" . $this->id;
    include "conexao.php";

    $resultado = $conexao->query($sql);
    $linha = $resultado->fetch();

    $this->email = $linha['nome'];
    $this->senha = $linha['senha'];
  }

  private function contarUsuarios()
  {
    include "classes/conexao.php";

    $sql = "SELECT COUNT(*) AS total FROM usuarios";

    $resultado = $conexao->prepare($sql);
    $resultado->execute();

    $linha = $resultado->fetch(PDO::FETCH_ASSOC);

    return $linha['total'];
  }
}
