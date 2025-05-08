<?php
session_start(); 

include 'Usuario.class.php';

if (isset($_POST['email']) && isset($_POST['senha'])) { 
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = new Usuario();
    $exito = $usuario->chkPass($email, $senha); 

    if ($exito) {
      
        $_SESSION['id'] = $exito['id'];
        $_SESSION['nome'] = $exito['nome'];


        header("Location: principal.php");
        exit();
    } else {
        echo "<script>
        alert('Usuário ou senha incorretos!');
        window.location.href = 'FormLogin.php';
        </script>";
    }
}
?>

