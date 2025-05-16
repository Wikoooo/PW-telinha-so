<?php
include 'Usuario.class.php';

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = new Usuario();

    $exito = $usuario->cadastrar($nome, $email, $senha);
    
    if ($exito) {
        echo "<script>
        alert('Usuário cadastrado com sucesso!');
        </script>";
    } else {
        echo "<script>
        alert('Email já cadastrado!');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>

</head>
<body>
    <form action="" method="POST">
        <h1>Cadastro</h1>
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
