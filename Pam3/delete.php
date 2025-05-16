<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: FormLogin.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require 'Usuario.class.php';
    $usuario = new Usuario();
    $usuario->apagarUsuario($id);

    header("Location: Tabela.php");
    exit;
}
?>
