<?php
require_once __DIR__ . '/dbconection.php';
require_once __DIR__ . '/../model/Usuario.php';

class UsuarioDAO {
    private $db;
    public function __construct() { 
        $this->db = new Database();
    }
    public function cadastrarUsuario(Usuario $usuario){
        // Implementar lógica para cadastrar usuário no banco de dados
        $conn = $this->db->getConnection();
        $sql = "INSERT INTO usuarios (email, senha, tipo, id_aluno) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario->getEmail(), $usuario->getSenha(), $usuario->getTipo(), $usuario->getIdAluno()]);
        $stmt->close();
    }

    public function iniciarSessao(Usuario $usuario){
        try {
            // Ajuste o nome da tabela/colunas conforme seu banco:
            // Aqui assumimos uma tabela 'usuarios' com colunas: ra (matrícula), senha_hash, nome, role
            $sql = 'SELECT idusuario, email, senha, tipo FROM usuario WHERE email = ? LIMIT 1';
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute([$usuario->getEmail()]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log('Iniciar sessão error: ' . $e->getMessage());
            return null;
        }
        return $user;
    }

    public function fecharSessao(){
        // Implementar lógica para encerrar sessão do usuário
    }
}