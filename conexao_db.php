<?php
// Configurações do banco de dados
$host = 'localhost';  // Endereço do servidor MySQL
$usuario = 'root'; // Nome de usuário do banco de dados
$senha = 'senha';  // Senha do banco de dados

// Conectar ao banco de dados
$mysqli = new mysqli($host, $usuario, $senha);

// Verificar a conexão
if ($mysqli->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $mysqli->connect_error);
}
// Fechar a conexão com o banco de dados quando terminar
//$mysqli->close();
