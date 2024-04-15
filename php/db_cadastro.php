<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudaenem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$email = $_POST["email"];
$senha = $_POST["senha"];
$telefone = $_POST["telefone"];
$imagem = $_FILES["imagem"]["tmp_name"];
$imagem_tipo = $_FILES["imagem"]["type"];

$stmt = $conn->prepare("INSERT INTO conta1 (email, senha, telefone, imagem) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $email, $senha, $telefone, $imagem_contenido);
$imagem_contenido = file_get_contents($imagem);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Dados enviados com sucesso.";
} else {
    echo "Erro ao enviar os dados.";
}


$conn->close();
?>