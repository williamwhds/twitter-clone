<?php
    // Verificando se há sessão
    session_start();
    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['user_id'])) {
        // Obtém variáveis de sessão
        $user_id = $_SESSION['user_id'];  
    } else {
        header("Location: index.php?msg1=Erro&msg2=Inicie sua sessão primeiro.");
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Twitter Clone</title>
  <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div id="container">
  <div id="left-sidebar">
    <img src="images/twitter-clone.png">
    <ul style="padding-left: 0;">
        <button class='dashboard-button'>🧑 Meu Perfil</button>
        <button class='dashboard-button'>⚙️ Editar</button>
        
        <form action='php/encerrar_sessao.php'>
            <button class='dashboard-button'>🚪 Sair</button>
        </form>
    </ul>
  </div>

  <div id="tweet-container">
    <?php
    // Buscando tweets no banco de dados
    require 'php/mostrar_tweets.php';
    ?>
  </div>

  <div id="right-sidebar">
    <h2>🕊️ Tweetar</h2>
    <ul style="padding-left: 0;">
      <button class="dashboard-button">✉️ Enviar tweet</button>
    </ul>

    <h2>🔭 Usuários</h2>
    <ul style="padding-left: 0;">
      <input class="dashboard-button" placeholder="@usuario">
      <button class='dashboard-button'>🔎 Pesquisar</button>
    </ul>
  </div>
</div>

</body>
</html>
