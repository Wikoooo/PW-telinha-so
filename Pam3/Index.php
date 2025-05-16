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
        <h1>Bem-vindo, <?php echo htmlspecialchars($nomeUsuario, ENT_QUOTES, 'UTF-8'); ?>!</h1>
       
        <div class="botoes">
            <a href="FormLogin.php"><button>Ir para Login</button></a>
            <a href="FormCast.php"><button>Ir para Cadastro</button></a>
            
        </div>
    </div>
</body>
</html>
