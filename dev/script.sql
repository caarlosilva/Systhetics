DROP DATABASE IF EXISTS systhetics;
CREATE DATABASE IF NOT EXISTS systhetics CHARACTER SET utf8mb4;
USE systhetics;

#DROP TABLE IF EXISTS Amizades;
#DROP TABLE IF EXISTS Mensagem;
#DROP TABLE IF EXISTS Usuario;

CREATE TABLE IF NOT EXISTS Usuario (
	email VARCHAR(64),
	nome VARCHAR(128) NOT NULL,
	senha VARCHAR(64) NOT NULL,
	tel1 VARCHAR(11) NOT NULL,
	tel2 VARCHAR(11),
	admin TINYINT(1) DEFAULT 0,
	PRIMARY KEY(email)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Cliente (
	nome VARCHAR(128) NOT NULL,
	tel1 VARCHAR(11) NOT NULL,
	email VARCHAR(64),
	tel2 VARCHAR(11),
	cep VARCHAR (32),
	rua VARCHAR(128),
	num VARCHAR (8),
	bairro VARCHAR(64),
	cidade VARCHAR(64),
	estado VARCHAR(64),
	PRIMARY KEY(nome, tel1)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

SET GLOBAL lc_time_names=pt_BR;
SET NAMES utf8mb4;

#INSERTS

INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("a@a.com", "Admin", "admin", "1612345678", "1912345678", 1);
