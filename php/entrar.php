<?php
// fazer: se ja estiver em sessão, redirecionar
require 'conexao_db.php';

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT id FROM usuarios WHERE usuario = '$email' AND senha = '$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // As credenciais são válidas, autenticar o usuário aqui
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $row['usuario'];
    header("Location: ../dashboard.php");
} else {
    // Senha incorreta ou usuário não encontrado
    header('location: ../index.php?msg1=Credenciais incorretas&msg2=Usuário ou senha não coincidem!');
}

$conn->close();
?>
