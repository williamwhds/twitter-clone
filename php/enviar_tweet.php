<?php
// Conectar ao banco de dados
require 'conexao_db.php';
session_start();
$id_usuario = $_SESSION["user_id"];
$tipo_tweet = "tweet";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se o corpo do tweet foi enviado
    if (!empty($_POST['corpo_tweet'])) {
        // Sanitize o corpo do tweet (evite SQL injection)
        $corpo_tweet = mysqli_real_escape_string($conn, $_POST['corpo_tweet']);

        // Verificar se uma imagem foi enviada
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            // Diretório para salvar as imagens
            $diretorio_destino = '../arq/tweet/';

            // Nome do arquivo
            $nome_arquivo = 'tweet_' . time() . '.jpg';

            // Caminho completo do arquivo
            $caminho_arquivo = $diretorio_destino . $nome_arquivo;

            // Mover o arquivo para o diretório de destino
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_arquivo)) {
                // URL da imagem a ser armazenada no banco de dados
                $url_imagem = $caminho_arquivo;
            } else {
                // Tratar erro no upload da imagem
                header("Location: ../dashboard.php?msg1=Erro!&msg2=Erro no upload da imagem. Por favor, tente novamente.". $_FILES['foto']['error']);
                exit();
            }
        } else {
            // Se nenhuma imagem foi enviada, definir $url_imagem como null
            $url_imagem = NULL;
        }

        // Insira o novo tweet no banco de dados
        $query = "INSERT INTO tweets (usuario_id, corpo, data_envio, tipo_tweet, url_imagem) VALUES ('$id_usuario', '$corpo_tweet', NOW(), '$tipo_tweet', '$url_imagem')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Tweet publicado com sucesso
            header("Location: ../dashboard.php?msg1=Sucesso!&msg2=Tweet publicado com sucesso.".$url_imagem);
            exit();
        } else {
            // Erro ao publicar o tweet
            header("Location: ../dashboard.php?msg1=Erro!&msg2=Erro ao publicar o tweet.");
            exit();
        }
    } else {
        // Corpo do tweet vazio
        header("Location: ../dashboard.php?msg1=Erro!&msg2=Corpo do tweet está vazio.");
        exit();
    }
}

// Feche a conexão com o banco de dados
mysqli_close($conn);
?>
