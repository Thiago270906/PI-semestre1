<?php
require_once 'app/config/dbconection.php';

class UsuarioDAO {
    public static function cadastrarUsuario(string $email, string $senha, string $tipo, int $id_aluno){
        // Implementar lógica para cadastrar usuário no banco de dados
        $db = new Database();
        $conn = $db->getConnection();
        $sql = "INSERT INTO usuarios (email, senha, tipo, id_aluno) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $email, $senha, $tipo, $id_aluno);
        $stmt->execute();
        $stmt->close();
    }

    public static function iniciarSessao(string $email, string $senha){
        // Implementar lógica para iniciar sessão do usuário
    }

    public static function fecharSessao(){
        // Implementar lógica para encerrar sessão do usuário
    }
}