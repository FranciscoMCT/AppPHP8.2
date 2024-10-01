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
$connectionInfo = array("UID" => "azureuser", "pwd" => "{your_password_here}", "Database" => "Loja", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:sqlserverlkygplon7tm2i.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>

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
