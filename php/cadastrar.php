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
  }
} catch(Exception $e) {
  echo $e->getMessage();
}

$conn->close();
?>
