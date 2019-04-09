DROP DATABASE IF EXISTS systhetics;
CREATE DATABASE IF NOT EXISTS systhetics CHARACTER SET utf8mb4;
USE systhetics;

#DROP TABLE IF EXISTS Amizades;
#DROP TABLE IF EXISTS Mensagem;
#DROP TABLE IF EXISTS Usuario;

CREATE TABLE IF NOT EXISTS Usuario (
	id INT AUTO_INCREMENT UNIQUE,
	email VARCHAR(64) NOT NULL,
	nome VARCHAR(128) NOT NULL,
	senha VARCHAR(64) NOT NULL,
	tel1 VARCHAR(16) NOT NULL,
	tel2 VARCHAR(16),
	admin TINYINT(1) DEFAULT 0,
	foto VARCHAR(256) DEFAULT "img/usuario/default.png",
	PRIMARY KEY(email)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Cliente (
	id INT AUTO_INCREMENT,
	nome VARCHAR(128),
	tel1 VARCHAR(16),
	tel2 VARCHAR(16),
	cep VARCHAR (32),
	rua VARCHAR(128),
	num VARCHAR (8),
	complemento VARCHAR(32),
	bairro VARCHAR(64),
	cidade VARCHAR(64),
	estado VARCHAR(64),
	PRIMARY KEY(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Produto (
	id INT AUTO_INCREMENT UNIQUE,
	nome VARCHAR(128) NOT NULL,
	descricao VARCHAR(512),
	preco DOUBLE NOT NULL,
	quantidade DOUBLE DEFAULT 0,
	foto VARCHAR(256) DEFAULT "img/produto/default.png",
	PRIMARY KEY(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

SET GLOBAL lc_time_names=pt_BR;
SET NAMES utf8mb4;

#INSERTS

INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("a@a.com", "Administrador Geral", "a", "(16) 12345-6789", "(19) 12345-6789", 1);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("b@b.com", "Barbara Palhaça Retardada Demais", "b", "(16) 12345-6789", "", 1);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("c@c.com", "Cleitin Silva", "c", "(16) 12345-6789", "(11) 12345-6789", 1);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("d@d.com", "Dado Dolabella", "d", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("e@e.com", "Ednaldo Pereira", "e", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("f@f.com", "Fanta Xuxa", "f", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("g@g.com", "Gabriel o Pensador", "g", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("h@h.com", "Horácio Dinossauro", "h", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("i@i.com", "Ingrid Ponei", "i", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("j@j.com", "Jorge Ben Jor", "j", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("k@k.com", "Kaka eae men", "k", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("l@l.com", "Lontra Armada", "l", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("m@m.com", "Marta Futebolista", "m", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("n@n.com", "Noberto Gomes", "n", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("o@o.com", "Otário Silva", "o", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("p@p.com", "Paula Tejano", "p", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("q@q.com", "Quati Alegre", "q", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("r@r.com", "Risotto Aguado", "r", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("s@s.com", "Sebastian Ingrosso", "s", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("t@t.com", "Truta Alada", "t", "(16) 12345-6789", "(19) 12345-6789", 0);

INSERT INTO Cliente (nome, tel1, tel2, cep, rua, num, complemento, bairro, cidade, estado) VALUES ("Carlos Eduardo Teixeira da Silva", "(16) 99755-0858", "(16) 33661-367", "13573059", "Joaquim Garcia de Oliveira", "882", "", "Cidade Aracy", "São Carlos", "SP");

INSERT INTO Produto (nome, descricao, preco, quantidade) VALUES ("Creme de Chiclete", "Nem sei se existe irmão, só pra teste.", 15.6, 15);