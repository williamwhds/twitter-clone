<?php
// Conectar ao banco de dados (use o seu método de conexão)
require 'conexao_db.php';

// Consulta para obter todos os tweets (sem limitação)
$query = "SELECT * FROM tweets ORDER BY data_envio DESC";
$result = mysqli_query($conn, $query);

// Processar os resultados e incorporar no HTML
if (mysqli_num_rows($result) > 0) {
    while ($tweet = mysqli_fetch_assoc($result)) {
        echo '<div class="tweet">';
        echo '<img class="user-photo" src="' . $tweet['url_foto_usuario'] . '" alt="User Photo">';
        echo '<div class="tweet-content">';
        echo '<div class="user-info">';
        echo '<span>' . $tweet['nome_usuario'] . '</span>';
        echo '<span>@' . $tweet['nome_usuario'] . '</span>';
        echo '<span>&#8226; ' . $tweet['data_envio'] . '</span>';
        echo '</div>';
        echo '<p>' . $tweet['corpo_tweet'] . '</p>';
        echo '<img class="tweet-image" src="' . $tweet['url_imagem'] . '" alt="Tweet Image">';
        echo '<div class="tweet-options">';
        echo '<div>';
        echo '<i class="fa fa-comment"></i> <span>' . $tweet['num_comentarios'] . '</span>';
        echo '<i class="fa fa-retweet"></i> <span>' . $tweet['num_retweets'] . '</span>';
        echo '<i class="fa fa-heart"></i> <span>' . $tweet['num_likes'] . '</span>';
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
