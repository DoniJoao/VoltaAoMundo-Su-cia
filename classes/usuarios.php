<?php

class Usuarios
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
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
