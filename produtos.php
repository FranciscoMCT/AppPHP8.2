<?php
--$serverName = "tcp:sqlserver63ujiagifce6s.database.windows.net,1433"; // Substitua pelo seu servidor
--$database = "loja"; // Substitua pelo seu banco de dados
--$user = "sql"; // Substitua pelo seu usuário
--$password = "Password#12324"; // Substitua pela sua senha

try {
    $conn = new PDO("sqlsrv:server=$serverName;database=$database", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}

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
