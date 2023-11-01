<?
include "conexao_db.php";

$name = $_POST["name"];
$username = $_POST["username"];
$password = $_POST["password"];

// Conexão com o banco de dados
$comando = "INSERT INTO 'twitter_clone'.'usuarios' (usuario, senha, nome) VALUES ('".$username."', '".$password."', '".$name."');";
$resultado = $mysqli->query($comando);

if ($resultado == false) {
    echo "Erro ao inserir registro: ".mysql_error();
    exit;
} else {
    echo "Registro inserido com sucesso! Bem vindo ".$username."!";
}

$resultado->close();
$mysqli->close();

?>
