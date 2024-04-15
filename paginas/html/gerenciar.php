
<!DOCTYPE html>
<html>
<head>
    <title>Editar Conta</title>
</head>
<body>
    <h1>Editar Conta</h1>
    <?php
    // Verifica se foi informado o ID da conta a ser editada
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        // Conexão com o banco de dados (substitua os valores de acordo com a sua configuração)
        $conn = new mysqli("localhost", "root", "", "estudaenem");

        // Verifica se a conexão foi bem-sucedida
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta SQL para selecionar os dados da conta com o ID informado
        $sql = "SELECT * FROM conta1 WHERE id = $id";
        $resultado = $conn->query($sql);

        // Verifica se encontrou a conta com o ID informado
        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            ?>
            <form method="post" action="atualizar.php">
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $row["email"]; ?>"><br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" value="<?php echo $row["senha"]; ?>"><br>
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" value="<?php echo $row["telefone"]; ?>"><br>
                <input type="submit" value="Atualizar">
            </form>
            <?php
        } else {
            echo "Nenhum registro encontrado.";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        echo "ID da conta não informado.";
    }
    ?>
</body>
</html>