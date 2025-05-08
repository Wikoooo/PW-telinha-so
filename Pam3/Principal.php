<?php
session_start();


if (!isset($_SESSION['id'])) {
    header("Location: FormLogin.php");
    exit;
}


$nomeUsuario = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tela Principal</title>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?php echo $nomeUsuario; ?>!</h1>
        <p>Você está logado com sucesso!</p>

        <a href="logout.php">Sair</a> 
    </div>
</body>
</html>
