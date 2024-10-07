<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeProduto = $_POST['nome'];
    $precoProduto = $_POST['preco'];

    $sql = "INSERT INTO Produtos (Nome, Preco) VALUES (:nome, :preco)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nomeProduto);
    $stmt->bindParam(':preco', $precoProduto);
    $stmt->execute();

    echo "Produto inserido com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Adicionar Novo Produto</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="produtos.php">Produtos</a>
        <a href="adicionar.php">Adicionar Produto</a>
    </nav>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" required>
        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
