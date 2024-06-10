<?php

require_once "Conexao.php";
class Usuario
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function cadastrar($nome, $senha)
    {
        // Verifica se o usuário já existe
        if ($this->existeUsuario($nome)) {
            throw new Exception("Nome de usuário já está em uso.");
        }

        // Insere o novo usuário no banco de dados
        $sql = "INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
    }

    public function login($nome, $senha)
    {
        // Verifica se o usuário existe
        if (!$this->existeUsuario($nome)) {
            throw new Exception("Usuário não encontrado.");
        }

        // Obtém a senha armazenada do usuário
        $sql = "SELECT senha FROM usuarios WHERE nome = :nome";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se a senha está correta
        if ($senha !== $resultado['senha']) {
            throw new Exception("Senha incorreta.");
        }

        // Login bem-sucedido
        return true;
    }

    private function existeUsuario($nome)
    {
        $sql = "SELECT COUNT(*) FROM usuarios WHERE nome = :nome";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
}

?>
