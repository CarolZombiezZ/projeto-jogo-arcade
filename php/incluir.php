<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdprojetofs";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Captura os dados do formulário
$player1 = $_POST['Player1'];
$player2 = $_POST['Player2'];

// Prepara a consulta SQL para inserir os dados
$sql = "INSERT INTO tbjogador (Player1, Player2) VALUES ('$player1', '$player2')";

// Executa a consulta e verifica se foi bem sucedida
if ($conn->query($sql) === TRUE) {
    echo "Nomes inseridos com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
