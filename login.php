<?php
session_start();
require_once __DIR__ . '/app/config/dbconection.php'; // caminho para sua classe Database

// Recebe POST
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

// Obter conexão (ajuste as credenciais se necessário)
// Se sua Database já usa defaults corretos, basta Database::getInstance();
$db = new Database();
$pdo = $db->getConnection();


try {
    // Ajuste o nome da tabela/colunas conforme seu banco:
    // Aqui assumimos uma tabela 'usuarios' com colunas: ra (matrícula), senha_hash, nome, role
    $sql = 'SELECT id, email, senha, role FROM usuarios WHERE email = ? LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && isset($user['senha']) && password_verify($senha, $user['senha_hash'])) {
        // Autenticado
        // Defina os dados de sessão que precisar
        $_SESSION['user'] = [
            'id' => $user['id'],
            'nome' => $user['nome'],
            'role' => $user['role'],
            'ra' => $ra
        ];

        // Redirecionar para área do usuário / admin
        if ($user['role'] === 'admin') {
            header('Location: view/admin/home_admin.html');
        } else {
            header('Location: view/usuario/home.html');
        }
        exit;
    } else {
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