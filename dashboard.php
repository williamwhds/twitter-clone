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

<?php
    // Verificando se há sessão
    session_start();
    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['user_id'])) {
        // Obtém variáveis de sessão
        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
    } else {
        header("Location: index.php?msg1=Erro&msg2=Inicie sua sessão primeiro.");
    }

    // Verificando se há popup
    require "php/popup.php";
    if (isset($_GET['msg1']) && isset($_GET['msg2'])) {
        echo criarPopupDark(urldecode($_GET['msg1']), urldecode($_GET['msg2']));
    }
?>

<div id="container">
  <div id="left-sidebar">
    <img src="images/twitter-clone.png">
    <ul style="padding-left: 0;">
        <a href='dashboard.php'>
          <button class='dashboard-button'>🏠 Dashboard</button> 
        </a>

        <button class='dashboard-button'>🧑 Meu Perfil</button>
        <button class='dashboard-button'>⚙️ Editar</button>

        <a href='php/encerrar_sessao.php'>
            <button class='dashboard-button'>🚪 Sair</button>
        </a>
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
      <button class="dashboard-button" id="open-popup">✉️ Enviar tweet</button>
    </ul>

    <div class="popup-front" id="popup-front">
      <div class="popup-content">
        <span class="popup-close" id="popup-close">&times;</span>
        <h2>Tweetar</h2>
          <form class="popup-form" action="php/enviar_tweet.php" method="post" enctype="multipart/form-data">
            <textarea rows="5" cols="60" class="dashboard-button" name="corpo_tweet" style="width:300px; height:100px; cursor: text;" placeholder="Escreva seu tweet aqui"></textarea>
            <input style="margin-bottom: 1.5rem;" type="file" name="foto" id="foto" accept="image/*">
            <button class="dashboard-button" type="submit">Tweetar</button>
          </form>
      </div>
    </div>
    <script src="js/popup.js"></script>

    <h2>🔭 Usuários</h2>
    <ul style="padding-left: 0;">
      <input class="dashboard-button" placeholder="@usuario" style="cursor: text;">
      <button class='dashboard-button'>🔎 Pesquisar</button>
    </ul>
  </div>
</div>

</body>
</html>
