<?php
// Código de conexão aqui...

$sql = "SELECT * FROM Produtos";
$stmt = $conn->query($sql);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Produtos</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="produtos.php">Produtos</a>
        <a href="adicionar.php">Adicionar Produto</a>
    </nav>
    <ul>
        <?php foreach ($produtos as $produto): ?>
            <li>ID: <?= $produto['ID'] ?> - Nome: <?= $produto['Nome'] ?> - Preço: <?= $produto['Preco'] ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
