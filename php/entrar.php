<?php
// fazer: se ja estiver em sessão, redirecionar
require 'conexao_db.php';

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT id FROM usuarios WHERE usuario = '$username' AND senha = '$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // As credenciais são válidas, autenticar o usuário aqui
    $id_usuario = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['id_usuario'] = $result;
    header('location: ../index.php?msgErro='.$id_usuario['id']);
} else {
    // Senha incorreta ou usuário não encontrado
    header('location: ../index.php?msgErro=Usuário ou senha não coincidem!');
}

//session_start();
//$_SESSION['id_usuario'] = $result;
$conn->close();
?>
