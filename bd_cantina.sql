	DROP DATABASE IF EXISTS Cantina;

	CREATE DATABASE Cantina;

	USE Cantina;



	CREATE TABLE Estabelecimento(
			IDEstabelecimento INT NOT NULL auto_increment PRIMARY KEY,
			CNPJ VARCHAR(14) NOT NULL UNIQUE KEY,
			Nome_Estabelecimento VARCHAR(100) NOT NULL,
			Endereco VARCHAR(100) NOT NULL,
			telefone BIGINT(14) NULL,
			email VARCHAR(100) NOT NULL,
			senha VARCHAR(30) NOT NULL

	);

	INSERT INTO Estabelecimento
	VALUES(null, '98563256987456', 'Cantina do Tonhao', 'Rua do Tonhao', '9911547896325', 'tonhao@tonhao.com', 'tonho');
	
	CREATE TABLE Produtos(
			IDProduto INT NOT NULL auto_increment PRIMARY KEY,
			IDEstabelecimento INT NOT NULL,
			nome_produto VARCHAR(40) NOT NULL,
			valor DECIMAL(4,2) NOT NULL,
			quant INT NOT NULL,
			descricao VARCHAR(250) NOT NULL,

			constraint FK_Estabelecimento foreign key (IDEstabelecimento) references Estabelecimento(IDEstabelecimento)
	);

	

	INSERT INTO Produtos
	VALUES(null, 1, 'Coxinha', '5.00', '45', 'Coxinha de Frango'),
	(null, 1, 'Hamburgão', '5.50', '41', 'Hamburguer com cheedar'),
	(null, 1, 'Beirute', '7.00', '20', 'Fatia unica de beirute de frango'),
	(null, 1, 'Pizza', '9.00', '10', 'Fatia unica de pizza de calabresa'),
	(null, 1, 'Bolo', '5.00', '85', 'fatia unica de bolo de chocolate');


CREATE TABLE Pedido(
		IDPedido INT NOT NULL auto_increment PRIMARY KEY,
		IDCliente INT NOT NULL,
		IDProduto INT NOT NULL,
		Quantidade_Produto INT NOT NULL,
		Data DATE NOT NULL,

		constraint FK_Clientes_IDCliente foreign key (IDCliente) references Clientes (IDClientes),
		constraint FK_Produtos_IDProduto foreign key (IDProduto)references Produtos (IDProduto)
);
CREATE TABLE Clientes(
		IDCliente INT auto_increment NOT NULL PRIMARY KEY,
		Nome VARCHAR(100) NOT NULL,
		Telefone BIGINT(14) NOT NULL,
		Email VARCHAR(100) NOT NULL
);
		

