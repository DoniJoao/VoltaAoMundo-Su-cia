<?php
class Conexao {
    // Método estático para obter uma conexão PDO com o banco de dados
    public static function getConnection() {
        try {
            // Configurações de conexão
            $dsn = 'mysql:host=127.0.0.1;dbname=VoltaAoMundo';
            $usuario = 'root';
            $senha = '';

            // Cria uma nova conexão PDO
            $conexao = new PDO($dsn, $usuario, $senha);

            // Define o modo de erro para exceções
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexao;
        } catch (PDOException $e) {
            // Em caso de erro, lança uma exceção
            throw new Exception('Erro ao conectar ao banco de dados: ' . $e->getMessage());
        }
    }
}
?>
