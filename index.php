<?php
// Pegar as variáveis de ambiente definidas no App Service
$serverName = getenv('servername');
$database = getenv('database');
$username = getenv('user');
$password = getenv('password');

// Depurar variáveis para verificar seus valores
// var_dump($serverName, $database, $username, $password); // Remova isto após depuração

try {
    // Verifica se as variáveis estão definidas
    if (!$serverName || !$database || !$username || !$password) {
        throw new Exception("Variáveis de ambiente não foram definidas corretamente.");
    }

    // Cria a conexão com o banco de dados usando PDO
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão com o banco de dados estabelecida com sucesso!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
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

