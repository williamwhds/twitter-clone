<?php
session_start();

// Conectar ao banco de dados
require 'conexao_db.php';

// Receber os dados do formulário
$user_id = $_SESSION['user_id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$nova_senha = $_POST['senha'];

// Processar a foto de perfil, se fornecida
if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
    $nome_foto = strtolower(str_replace(' ', '_', $nome)) . '_' . time();
    $diretorio_destino = '../arq/perfil/'; // Substitua pelo caminho real
    $nome_arquivo = $nome_foto . '.jpg';
    $caminho_arquivo = $diretorio_destino . $nome_arquivo;
    if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $caminho_arquivo)) {
        header("Location: ../editar.php?msg1=Erro no upload da imagem.&msg2=Por favor, tente novamente.");
        exit();
    }
    $url_imagem = $caminho_arquivo;
} else {
    $url_imagem = null; // Caso nenhuma nova foto seja fornecida
}

// Construir a consulta SQL para atualizar as informações do usuário
$query = "UPDATE usuarios SET nome = '$nome', email = '$email'";

// Adicionar a alteração da senha se uma nova senha foi fornecida
if (!empty($nova_senha)) {
    $query .= ", senha = '$nova_senha'";
}

// Adicionar a alteração da foto de perfil se uma nova foto foi fornecida
if ($url_imagem !== null) {
    $query .= ", url_imagem = '$url_imagem'";
}

// Concluir a consulta
$query .= " WHERE id = '$user_id'";

// Executar a consulta
$result = mysqli_query($conn, $query);

// Verificar se a atualização foi bem-sucedida
if ($result) {
    header("Location: ../editar.php?msg1=Sucesso!&msg2=Perfil atualizado com sucesso.");
} else {
    header("Location: ../editar.php?msg1=Erro ao atualizar o perfil&msg2=" . mysqli_error($conn));
}

// Fechar a conexão
$conn->close();
?>
