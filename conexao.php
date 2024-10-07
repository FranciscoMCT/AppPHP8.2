<?php
// Pegar as variáveis de ambiente definidas no App Service
$serverName = getenv('servername');
$database = getenv('database');
$username = getenv('user');
$password = getenv('password');

// Depurar variáveis para verificar seus valores
//var_dump($serverName, $database, $username, $password); // Remova isto após depuração

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
