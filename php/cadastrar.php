<?php
require 'conexao_db.php';

// Pegando variáveis
$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Pegando foto
if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
  $nome_foto = 'perfil_' . $username . "_" . time() . '.jpg';

  // Diretório para salvar as imagens
  $diretorio_destino = '../arq/perfil/';

  // Nome do arquivo
  $nome_arquivo = $nome_foto . '.jpg';

  // Caminho completo do arquivo
  $caminho_arquivo = $diretorio_destino . $nome_arquivo;

  // Mover o arquivo para o diretório de destino
  if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $caminho_arquivo)) {
      header("Location: ../index.php?msg1=Erro&msg2=Erro no upload da imagem. Por favor, tente novamente.");
      exit;
  }
} else {
  header("Location: ../index.php?msg1=Erro&msg2=Erro no upload da imagem. Por favor, tente novamente.");
  exit;
}

// Conexão com o banco de dados
$sql = "INSERT INTO usuarios VALUES (null, '".$name."', '".$username."', '".$email."', '".$password."', '".$caminho_arquivo."')";
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
