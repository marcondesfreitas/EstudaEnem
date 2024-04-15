<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];

    // Conexão com o banco de dados (substitua os valores de acordo com a sua configuração)
    $conn = new mysqli("localhost", "root", "", "estudaenem");

    // Verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Atualiza os dados da conta no banco de dados
    $sql = "UPDATE conta1 SET email = '$email', senha = '$senha', telefone = '$telefone' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Dados atualizados com sucesso.";
    } else {
        echo "Erro ao atualizar os dados: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Os dados não foram enviados via POST.";
}


?>