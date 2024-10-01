<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:sqlserverlkygplon7tm2i.database.windows.net,1433; Database = Loja", "azureuser", "P@$$W)RD1234");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "azureuser", "pwd" => "P@$$W)RD1234", "Database" => "Loja", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:sqlserverlkygplon7tm2i.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

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
