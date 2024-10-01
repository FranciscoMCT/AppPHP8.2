<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:tiofranserverdb.database.windows.net,1433; Database = loja", "tiofranserverdb-admin", "sk6y5RJ5rm$R$bhI");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "tiofranserverdb-admin", "pwd" => "sk6y5RJ5rm$R$bhI", "Database" => "loja", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:tiofranserverdb.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Loja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bem-vindo à Loja</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="produtos.php">Produtos</a>
        <a href="adicionar.php">Adicionar Produto</a>
    </nav>
    <h2>Produtos Disponíveis</h2>
    <ul>
        <?php
        $sql = "SELECT * FROM Produtos";
        $stmt = $conn->query($sql);
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($produtos as $produto) {
            echo "<li>ID: " . $produto['ID'] . " - Nome: " . $produto['Nome'] . " - Preço: " . $produto['Preco'] . "</li>";
        }
        ?>
    </ul>
</body>
</html>
