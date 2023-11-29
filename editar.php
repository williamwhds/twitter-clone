<?php
session_start();

// Conectar ao banco de dados
require 'php/conexao_db.php';

// Verificar se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?msg1=Erro&msg2=Inicie sua sessão primeiro.");
    exit();
}

// Obter o ID do usuário atual
$user_id = $_SESSION['user_id'];

// Consultar informações do usuário no banco de dados
$query = "SELECT nome, usuario, url_imagem FROM usuarios WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);

// Verificar se a consulta foi bem-sucedida
if ($result) {
    $usuario = mysqli_fetch_assoc($result);

    // Exibir as informações do usuário no formulário
    $nome = $usuario['nome'];
    $nome_usuario = $usuario['usuario'];
    $url_imagem = $usuario['url_imagem'];
} else {
    // Tratar erro na consulta
    echo "Erro ao obter informações do usuário: " . mysqli_error($conn);
    exit();
}

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/dashboard.css">
  <title>Editar perfil</title>
</head>
<body>

<?php
// Verificando se há popup
require "php/popup.php";
if (isset($_GET['msg1']) && isset($_GET['msg2'])) {
    echo criarPopupDark(urldecode($_GET['msg1']), urldecode($_GET['msg2']));
}
?>

<div id="container">
  <div id="left-sidebar">
    <img src="images/twitter-clone.png">

    <img style='margin-top:1rem;' class='user-photo' src="<?php echo substr($url_imagem, 3) ?>" alt="Profile Photo">
    <h2 style='margin:0;'><?php echo $nome ?></h2>
    <p style='margin-top: 0;'>@<?php echo $nome_usuario ?></p>

    <ul style="padding-left: 0;">
        <a href='dashboard.php'>
          <button class='dashboard-button'>🏠 Dashboard</button> 
        </a>

        <a href='pesquisar.php?usr=<?php echo $_SESSION['username'] ?>'>
          <button class='dashboard-button'>🧑 Meus tweets</button>
        </a>

        <a href='editar.php'>
          <button class='dashboard-button'>⚙️ Editar perfil</button>
        </a>

        <a href='php/encerrar_sessao.php'>
            <button class='dashboard-button'>🚪 Sair</button>
        </a>
    </ul>
</div>

  <div id="tweet-container" style=''>
    <!-- Conteúdo do formulário de edição -->
    <h1>Editar informações</h1>
    
    <form action="php/editar.php" method="post" enctype="multipart/form-data">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" placeholder="Novo nome" required>

      <label for="email">E-mail:</label>
      <input type="text" id="email" name="email" placeholder="novo@email.com" required>

      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" placeholder="Nova senha">

      <label for="foto">Foto de Perfil:</label>
      <input type="file" id="foto" name="foto">

      <button type="submit" class="dashboard-button" style='margin-bottom: 0; margin-top:1.5rem; font-size: 1rem; margin-left:26rem;'>Salvar Alterações</button>
    </form>
  </div>
</div>

</body>
</html>
