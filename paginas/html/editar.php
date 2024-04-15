
<!DOCTYPE html>
<html>
<head>
    <title>Editar Conta</title>
    <link rel="stylesheet" href="../../css/editar-contas2.css">
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
</head>
<body>
    <header>
    <h1>Editar Conta</h1>
    </header><br><br>
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
            <div class="container">
                <fieldset class="fild">
                    <h2>ATUALIZE OS DADOS</h2>
                    <form method="post" action="atualizar.php">
                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="inputs" id="email" value="<?php echo $row["email"]; ?>"><br><br>
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" class="inputs" value="<?php echo $row["senha"]; ?>"><br><br>
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" id="tell" class="inputs" maxlength="15" value="<?php echo $row["telefone"]; ?>"><br><br>
                        <input type="submit" value="Atualizar" class="btn">
                    </form>
                </fieldset>
            </div>
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
    <script src="../../js/editar.js"></script>
</body>
</html>