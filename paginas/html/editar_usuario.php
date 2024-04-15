<?php

// Recuperar o ID da URL
$id = $_GET["id"];

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "estudaenem";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];
    $id = $_POST["id"]; 

    $sql = "UPDATE conta1 SET email=?, senha=?, telefone=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $email, $senha, $telefone, $id);
    
    $stmt->execute();
    $stmt->close();
}

// Selecionar os dados do usuário do banco de dados
$sql = "SELECT * FROM conta1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();
$stmt->close();

// Fechar a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Usuário</title>
    <link rel="stylesheet" href="../css/editar_usuario.css">
</head>
<body>
    <fieldset class="fild">
	<h1>Editar Usuário</h1>
    <hr class="hr1">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="number" name="id" class="id" placeholder="digite o id da conta a ser editada" required><br><br>
            <h2>NOVOS DADOS</h2>
            <input type="email" name="email" class="email" placeholder="Novo email:"  required><br><br>
            <input type="password" name="senha" class="senha" placeholder="Nova senha" required><br><br>
            <input type="tel" name="telefone" id="tell" class="numero" maxlength="15" placeholder="novo numero Ex: (88) 9999-9999">
            <!-- <input type="text" name="telefone" class="numero" placeholder="novo numero Ex: (88) 9999-9999" required><br><br> -->
                <div class="btnn">
                    <input type="submit" class="btn" value="Salvar">
                </div>
        </form>
    </fieldset>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="editar.js"></script>
</body>
</html> 