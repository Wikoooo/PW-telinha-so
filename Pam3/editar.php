<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: FormLogin.php");
    exit;
}

require 'Usuario.class.php';
$usuario = new Usuario();


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $dados = $usuario->getById($_GET['id']);
    if (!$dados) {
        echo "Usuário não encontrado.";
        exit;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario->alterarUsuario($id, $nome, $email, $senha);
    header("Location: Tabela.php");
    exit;
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?= $dados['id'] ?>">
    Nome: <input type="text" name="nome" value="<?= $dados['nome'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $dados['email'] ?>"><br>
    Senha: <input type="text" name="senha" value="<?= $dados['senha'] ?>"><br>
    <input type="submit" value="Salvar Alterações">
    <link rel="stylesheet" href="style.css">
</form>
