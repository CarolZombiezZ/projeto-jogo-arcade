<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdprojetofs";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
} else {
    echo "Conexão com o banco de dados foi bem-sucedida!";
}

// Recebe os dados enviados via POST
$data = json_decode(file_get_contents("php://input"), true);

// Verifica se os dados foram recebidos corretamente
if (isset($data['jogador'], $data['personagem'], $data['vitorias'], $data['derrotas'], $data['empate'])) {
    // Escapa as strings para prevenir SQL injection
    $jogador = intval($data['jogador']);
    $personagem = intval($data['personagem']);
    $vitorias = intval($data['vitorias']);
    $derrotas = intval($data['derrotas']);
    $empate = intval($data['empate']);

    // Inserir ou atualizar os dados na tabela
    $sql = "UPDATE tbpontuacao SET Vitorias = $vitorias + Vitorias , Derrotas = $derrotas, Empate = $empate WHERE PoJgID = $jogador AND PoPsID = $personagem";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Dados sincronizados com sucesso"]);
    } else {
        echo json_encode(["message" => "Erro: " . $sql . "<br>" . $conn->error]);
    }
} else {
    echo json_encode(["message" => "Dados incompletos fornecidos"]);
}

$conn->close();
?>