<?php
session_start();
require_once __DIR__ . '/app/model/Usuario.php';
require_once __DIR__ . '/app/controller/UsuarioController.php';

// Recebe POST
$usuario = new Usuario();
$usuario->setEmail(isset($_POST['email']) ? trim($_POST['email']) : '');
$usuario->setSenha(isset($_POST['senha']) ? $_POST['senha'] : '');

try {
    if (empty($usuario->getEmail()) || empty($usuario->getSenha())) {
        throw new Exception('Preencha todos os campos');
    }

        $usuarioController = new UsuarioController();
        $user = $usuarioController->login($usuario);

        // Redirecionar para área do usuário / admin
        if ($user['tipo'] === 'administrador') {
            header('Location: app/view/admin/home_admin.html');
        } else {
            header('Location: app/view/usuario/home.html');
        }
        exit;
        if (!$user) {
        // Credenciais inválidas
        // Você pode guardar mensagem na session e mostrar na index.php
        $_SESSION['login_error'] = 'Matrícula ou senha inválida.';
        header('Location: index.php');
        exit;
    }

} catch (Exception $e) {
    error_log('Login error: ' . $e->getMessage());
    $_SESSION['login_error'] = 'Erro no processo de login. Tente novamente.';
    header('Location: index.php');
    exit;
}