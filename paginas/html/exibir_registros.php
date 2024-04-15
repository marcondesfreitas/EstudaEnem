<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/editar-contas.css">
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
    <title>Tabela de Contas</title>
    <link rel="stylesheet" href="../../css/tabela_registros.css">
</head>
<body>
    <header>
    </header><br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Telefone</th>
            <th>Ação</th>
        </tr>
        <?php

		
        // Conexão com o banco de dados (substitua os valores de acordo com a sua configuração)
        $conn = new mysqli("localhost", "root", "", "estudaenem");

        // Verifica se a conexão foi bem-sucedida
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta SQL para selecionar os dados da tabela conta1
        $sql = "SELECT * FROM conta1";
        $resultado = $conn->query($sql);

        // Exibe os dados na tabela
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td id='1'>" . $row["id"] . "</td>";
            echo "<td id='2'>" . $row["email"] . "</td>";
            echo "<td id='3'>" . $row["senha"] . "</td>";
            echo "<td id='4'>" . $row["telefone"] . "</td>";
            echo "<td><a class='edit' href='editar.php?id=" . $row["id"] . "'>Editar</a></td>";
            echo "</tr>";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
        ?>
    </table><br><br>
    <a class="btn"  href="../../index.php"><button id="botao">VOLTAR</button></a>
    <script src="../../js/registros.js"></script>
</body>
</html>