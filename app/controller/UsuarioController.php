<?php
require_once 'app/config/Dbconection.php';
require_once 'app/model/Usuario.php';

class UsuarioController {
    public static function cadastrar(string $email, string $senha, string $tipo, int $id_aluno){
        try {
            UsuarioDAO.cadastrarUsuario($email, $senha, $tipo, $id_aluno);
        } catch (Exception $e) {
            error_log("Erro ao cadastrar usuário: " . $e->getMessage());
        }
    }

    public static function login(string $email, string $senha){
        try {
            UsuarioDAO.iniciarSessao($email, $senha);
        } catch (Exception $e) {
            error_log("Erro ao iniciar sessão: " . $e->getMessage());
        }
    }

    public static function logout(){
        try {
            UsuarioDAO.fecharSessao();
        } catch (Exception $e) {
            error_log("Erro ao encerrar sessão: " . $e->getMessage());
        }
    }


}