CREATE DATABASE IF NOT EXISTS twitter_clone;

USE twitter_clone;

CREATE TABLE IF NOT EXISTS usuarios (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(255) NOT NULL,
	usuario VARCHAR(255) UNIQUE NOT NULL,
	email VARCHAR(255) UNIQUE NOT NULL,
	senha VARCHAR(255) NOT NULL,
    url_imagem VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tweets (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usuario_id INT NOT NULL,
    data_envio DATETIME NOT NULL,
    corpo TEXT NOT NULL,
    tipo_tweet ENUM('tweet', 'comentario', 'retweet') NOT NULL,
    tweet_original_id INT, -- Referência ao tweet original (se for um comentário ou retweet)
    url_imagem VARCHAR(255), -- Caminho para a imagem, se houver
    likes INT DEFAULT 0,
    comentarios INT DEFAULT 0,
    retweets INT DEFAULT 0,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (tweet_original_id) REFERENCES tweets(id)
);

CREATE TABLE IF NOT EXISTS likes (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usuario_id INT NOT NULL,
    tweet_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (tweet_id) REFERENCES tweets(id),
    UNIQUE KEY unique_like (usuario_id, tweet_id) -- Garante que um usuário não pode dar like duas vezes no mesmo tweet
);

