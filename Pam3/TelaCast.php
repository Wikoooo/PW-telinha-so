
<?php
include 'Usuario.class.php';

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = new Usuario();

    if (!$usuario) {
        echo "<script>
            alert('Erro ao Conectar. Tente mais tarde');
        </script>";
    } else {
        $exito = $usuario->cadastrar($nome, $email, $senha);
        if ($exito) {
            echo "<script>
                alert('Usuário CADASTRADO com sucesso!');
            </script>";
        } else {
            echo "<script>
                alert('Usuario já CADASTRADO!');
            </script>";
        }
    }
}
?>