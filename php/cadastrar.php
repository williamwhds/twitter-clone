<?php
require 'conexao_db.php';

// Pegando variáveis
$name = $_POST["name"];
$username = $_POST["username"];
$password = $_POST["password"];

// Conexão com o banco de dados
$sql = "INSERT INTO usuarios VALUES (null, '".$username."', '".$password."', '".$name."')";
try {
  if ($conn->query($sql)) {
      echo "Registro inserido com sucesso! Bem vindo ".$username."!";
      header('location: ../index.php?criou=1');   // Retornando pro index.php com uma variável GET.
  }                                               // Exibir pro usuário que a conta foi criada
} catch(Exception $e) {
  echo "Erro: ".$e->getMessage();
}

$conn->close();
?>
