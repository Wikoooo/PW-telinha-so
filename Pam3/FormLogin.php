<?php
session_start();
include 'Usuario.class.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = new Usuario();
    $usuarioDados = $usuario->chkPass($email, $senha); 

    if ($usuarioDados) {
       
        $_SESSION['id'] = $usuarioDados['id'];
        $_SESSION['nome'] = $usuarioDados['nome'];
        header("Location: Principal.php"); 
        exit;
    } else {
        echo "<script>
        alert('Email ou senha incorretos!');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="FormLogin.php" method="POST">
        <h1>Login</h1>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
