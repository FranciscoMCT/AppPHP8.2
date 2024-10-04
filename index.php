// <?php
// $serverName = "tcp:sqlserver63ujiagifce6s.database.windows.net,1433"; // Substitua pelo seu servidor
// $database = "loja"; // Substitua pelo seu banco de dados
// $username = "sql"; // Substitua pelo seu usuário
// $password = "Password#12324"; // Substitua pela sua senha

try {
// $conn = new PDO("sqlsrv:server=$serverName;database=$database", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo "Erro na conexão: " . $e->getMessage();
}
// ?>

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
        <a href="excluir.php">Excluir Produto></a>>
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

