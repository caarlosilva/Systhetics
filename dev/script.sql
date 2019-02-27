CREATE DATABASE IF NOT EXISTS systhetics CHARACTER SET utf8mb4;
USE systhetics;

#DROP TABLE IF EXISTS Amizades;
#DROP TABLE IF EXISTS Mensagem;
#DROP TABLE IF EXISTS Usuario;

CREATE TABLE IF NOT EXISTS Usuario (
	email VARCHAR(128),
	nome VARCHAR(64) NOT NULL,
	senha VARCHAR(64) NOT NULL,
	tel1 VARCHAR(11) NOT NULL,
	tel2 VARCHAR(11),
	imagem VARCHAR(128) NOT NULL DEFAULT "padrao.png",
	PRIMARY KEY(email)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Cliente (
	emailUsuario1 VARCHAR(128) NOT NULL,
	emailUsuario2 VARCHAR(128) NOT NULL,
	pedido TINYINT(1) NOT NULL DEFAULT 1,
	PRIMARY KEY(emailUsuario1,emailUsuario2),
	FOREIGN KEY(emailUsuario1) REFERENCES Usuario(email),
	FOREIGN KEY(emailUsuario2) REFERENCES Usuario(email)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Mensagem (
	idMensagem INT AUTO_INCREMENT,
	emailEnvio VARCHAR(128) NOT NULL,
	emailRecebimento VARCHAR(128) NOT NULL,
	conteudoMensagem VARCHAR(512) CHARACTER SET utf8mb4 NOT NULL,
	tipoMensagem INT,
	dataEnvio DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(idMensagem),
	FOREIGN KEY(emailEnvio) REFERENCES Usuario(email),
	FOREIGN KEY(emailRecebimento) REFERENCES Usuario(email)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

SET GLOBAL lc_time_names=pt_BR;
SET NAMES utf8mb4;

INSERT INTO Usuario (email, username, frase, senha, nickname, imagem) VALUES ("a@a.com","Tia do zap", "Esperando cair o 13º kkk","a","Tia do zap","a@a.com.png");
INSERT INTO Usuario (email, username, frase, senha, nickname, imagem) VALUES ("b@b.com","Big different", "Eu UsO lInUx, VcS sAbIaM???","b","Big different","b@b.com.png");
INSERT INTO Usuario (email, username, frase, senha, nickname, imagem) VALUES ("c@c.com","FORA BANDIDAGEM", "CRIME OCORRE NADA ACONTECE", "c","FORA BANDIDAGEM","c@c.com.png");
INSERT INTO Usuario (email, username, frase, senha, nickname, imagem) VALUES ("d@d.com","Erilang", "Tá horrível isso, deleta","d","Erilang","d@d.com.png");

INSERT INTO Amizades VALUES ("a@a.com", "b@b.com", 0);
INSERT INTO Amizades VALUES ("a@a.com", "c@c.com", 0);
INSERT INTO Amizades VALUES ("a@a.com", "d@d.com", 0);