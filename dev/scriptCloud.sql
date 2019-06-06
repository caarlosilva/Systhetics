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
	foto VARCHAR(256) DEFAULT "img/cliente/default.png",
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

CREATE TABLE IF NOT EXISTS Servico (
	id INT AUTO_INCREMENT UNIQUE,
	nome VARCHAR(128) NOT NULL,
	descricao VARCHAR(512),
	tipo VARCHAR(64),
	preco DOUBLE NOT NULL,
	foto VARCHAR(256) DEFAULT "img/produto/default.png",
	PRIMARY KEY(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS agenda (
	id int AUTO_INCREMENT UNIQUE,
	id_serv int NOT NULL,
	id_cliente int NOT NULL,
	id_usuario int NOT NULL,
	title varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	description varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	start_date varchar(50) COLLATE utf8_unicode_ci NOT NULL,
	end_date varchar(50) COLLATE utf8_unicode_ci NOT NULL,
	created datetime NOT NULL,
	marcado varchar(62) NOT NULL,
	status tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block',
	FOREIGN KEY (id_serv) REFERENCES Servico(id),
	FOREIGN KEY (id_cliente) REFERENCES Cliente(id),
	FOREIGN KEY (id_usuario) REFERENCES Usuario(id),
	PRIMARY KEY(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;


CREATE TABLE IF NOT EXISTS Venda (
	id int AUTO_INCREMENT UNIQUE,
	id_usuario int NOT NULL,
	data varchar(50) COLLATE utf8_unicode_ci NOT NULL,
	total DOUBLE,
	FOREIGN KEY (id_usuario) REFERENCES Usuario(id),
	PRIMARY KEY(id)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS ProdutosVenda (
	id_venda int ,
	id_produto int,
	qtd_venda double,
	precoVenda double,
	FOREIGN KEY (id_venda) REFERENCES Venda(id),
	FOREIGN KEY (id_produto) REFERENCES Produto(id),
	PRIMARY KEY(id_venda, id_produto)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

SET GLOBAL lc_time_names=pt_BR;
SET NAMES utf8mb4;

#INSERTS

INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("a@a.com", "Administrador Geral", "a", "(16) 12345-6789", "(19) 12345-6789", 1);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("b@b.com", "Barba Prefeito", "b", "(16) 12345-6789", "", 1);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("c@c.com", "Cleitin Silva", "c", "(16) 12345-6789", "(11) 12345-6789", 1);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("d@d.com", "Dado Dolabella", "d", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("e@e.com", "Ednaldo Pereira", "e", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("f@f.com", "Fanta Xuxa", "f", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("g@g.com", "Gabriel o Pensador", "g", "(16) 12345-6789", "(19) 12345-6789", 0);
INSERT INTO Usuario (email, nome, senha, tel1, tel2, admin) VALUES ("h@h.com", "Horácio Dinossauro", "h", "(16) 12345-6789", "(19) 12345-6789", 0);

INSERT INTO Cliente (nome, tel1, tel2, cep, rua, num, complemento, bairro, cidade, estado) VALUES 
("Dorivaldo Pederneiras", "(16) 99775-7828", "(16) 33666-667", "13573059", "Joaquim Garcia de Oliveira", "882", "", "Cidade Aracy", "São Carlos", "SP"),
("Jorge Ben Jor", "(11) 99789-5389", "(16) 40028-922", "13573050", "Avenida Regit Arab", "190", "", "Cidade Aracy", "São Carlos", "SP");

INSERT INTO Produto (nome, descricao, preco, quantidade) VALUES 
("Creme Facial Natura", "Isso é um creme pra jogar na cara, tipo reboco.", 19.9, 58),
("Manteiga de Cacau", "Aquela parada q tu só usa quando ta sem boca já.", 7.50, 87),
("Óleo de Cozinha", "Pode passar no corpo também sim, eu vi na internet.", 8.99, 23),
("Shampoo Betina", "Pra dar aquela investida no cabelo", 1000000, 1);
("Pente Fino", "Sua vó provavelmente usou bastante isso já.", 3.5, 0);

INSERT INTO Servico (nome, descricao, tipo, preco) VALUES 
("Limpeza de Pele", "Ducha completo na pessoa meu cumpadi", "Corporal", 50),
("Esfoliação", "Uma lixa 3000 passando pelo seu corpo", "Corporal", 35),
("Acumputura", "Vários prego na sua cabeça", "Facial", 40),
("Massagem", "Uns chute na bunda e ta bom", "Corporal", 30);
