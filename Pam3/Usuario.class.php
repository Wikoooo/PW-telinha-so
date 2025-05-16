<?php
class Usuario {
    private $pdo;

    public function __construct() {
        $dns = "mysql:dbname=Banquino;host=localhost;port=3306";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dns, $dbUser, $dbPass);
        } catch (\Throwable $th) {
            die("Erro ao conectar ao banco de dados");
        }
    }

    public function cadastrar($nome, $email, $senha){
        $ver = $this->pdo->prepare("SELECT id FROM Usuarinhos WHERE email = :e");
        $ver->bindValue(":e", $email);
        $ver->execute();

        if ($ver->rowCount() > 0) {
            return false;
        }

        $sql = "INSERT INTO Usuarinhos (nome, email, senha) VALUES (:n, :e, :s)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);

        return $stmt->execute();
    }

    public function chkPass($email, $senha){
        $sql = "SELECT * FROM Usuarinhos WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch();
            if ($senha == $usuario['senha']) {
                return $usuario;
            }
        }
        return array();
    }

    public function getAmostra(){
        $sql = "SELECT * FROM Usuarinhos";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function apagarUsuario($id){
        $sql = "DELETE FROM Usuarinhos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

    public function alterarUsuario($id, $nome, $email, $senha){
        $sql = "UPDATE Usuarinhos SET nome = :n, email = :e, senha = :s WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }
    public function getById($id) {
        $sql = "SELECT * FROM Usuarinhos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>
