<?php
// Conectar ao banco de dados (use o seu método de conexão)
require 'conexao_db.php';

// Consulta para obter todos os tweets (sem limitação)
$query = "SELECT tweets.*, usuarios.url_imagem as imagem_perfil, usuarios.nome, usuarios.usuario
          FROM tweets
          JOIN usuarios ON tweets.usuario_id = usuarios.id
          ORDER BY tweets.data_envio DESC";

$result = mysqli_query($conn, $query);

// Processar os resultados e incorporar no HTML
if (mysqli_num_rows($result) > 0) {
    while ($tweet = mysqli_fetch_assoc($result)) {
        echo '<div class="tweet">';
        echo '<img class="user-photo" src="' . substr($tweet['imagem_perfil'], 3) . '" alt="User Photo">';
        echo '<div class="tweet-content">';
        echo '<div class="user-info">';
        echo '<span>' . $tweet['nome'] . ' </span>';
        echo '<span>&#8226; @' . $tweet['usuario'] . '</span>';
        echo '<span> &#8226; ' . $tweet['data_envio'] . '</span>';
        echo '</div>';
        echo '<p>' . $tweet['corpo'] . '</p>';
        if ($tweet['url_imagem'] != null) { echo '<img class="tweet-image" src="' . substr($tweet['url_imagem'], 3) . '" alt="Tweet Image">';}
        echo '<div class="tweet-options">';
        echo '<div>';
        echo '<i class="fa fa-comment"></i> <span>' . $tweet['comentarios'] . ' |</span>';
        echo '<i class="fa fa-retweet"></i> <span>' . $tweet['retweets'] . ' |</span>';
        echo '<i class="fa fa-heart"></i> <span>' . $tweet['likes'] . '</span>';
        echo '</div>';
        echo '<i class="fa fa-ellipsis-h"></i>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    // Não há tweets, exiba uma mensagem
    echo '<div class="tweet">';
    echo '<h1>Não há tweets.</h1>';
    echo '</div>';
}

$conn->close();
?>
