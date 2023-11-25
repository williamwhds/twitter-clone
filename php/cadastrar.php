<?php
require 'conexao_db.php';

// Pegando variáveis
$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Conexão com o banco de dados
$sql = "INSERT INTO usuarios VALUES (null, '".$name."', '".$username."', '".$email."', '".$password."')";
try {
  if ($conn->query($sql)) {
      header('location: ../index.php?msg1=Sucesso!&msg2=Sua conta foi criada!');   // Retornando pro index.php com uma variável GET.
  }                                               // Exibir pro usuário que a conta foi criada
} catch(Exception $e) {
  $msgErro = $e->getMessage();
  header('location: ../index.php?msg1=Erro na criação de conta!&msg2='.$msgErro); // Exibir que ocorreu um erro
}

$conn->close();
?>
