CREATE TABLE Produtos (
    ID INT PRIMARY KEY IDENTITY(1,1),
    Nome NVARCHAR(100) NOT NULL,
    Preco DECIMAL(10, 2) NOT NULL
);

INSERT INTO Produtos (Nome, Preco) VALUES ('Produto 1', 10.99);
INSERT INTO Produtos (Nome, Preco) VALUES ('Produto 2', 20.50);
INSERT INTO Produtos (Nome, Preco) VALUES ('Produto 3', 30.00);
INSERT INTO Produtos (Nome, Preco) VALUES ('Produto 4', 15.75);
INSERT INTO Produtos (Nome, Preco) VALUES ('Produto 5', 50.20);
INSERT INTO Produtos (Nome, Preco) VALUES ('Produto 6', 60.80);
INSERT INTO Produtos (Nome, Preco) VALUES ('Produto 7', 7.99);
INSERT INTO Produtos (Nome, Preco) VALUES ('Produto 8', 12.49);
INSERT INTO Produtos (Nome, Preco) VALUES ('Produto 9', 99.99);
INSERT INTO Produtos (Nome, Preco) VALUES ('Produto 10', 25.00);
