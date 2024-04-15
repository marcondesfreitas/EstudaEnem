<?php
// Conexão com o banco de dados (substitua os valores pelos seus próprios)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudaenem";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Falha na conexão: " . mysqli_connect_error());
}

$sql = "SELECT * FROM EDfisica";
$result = mysqli_query($conn, $sql);
if (!$result) {
  die('Erro na consulta SQL: ' . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    // Exibir a imagem
    $sql = mysqli_query($conn, "SELECT imagem FROM EDfisica");
    if (!$sql) {
      die('Erro na consulta SQL: ' . mysqli_error($conn));
    }
    $imagem = $row["imagem"];

    echo "<h1>" . $row["titulo"] . "  -  " . $row["subtitulo"] . ":</h1>";
    echo "<div class='slrboy'>" . $row["conteudo"] . "</div>";
    echo '<img class="imgggg" src="data:image/jpg;base64, '. base64_encode($imagem) . '" />';
    echo "<hr class='linhaa'>"; 
  }
} else {
  echo 'Não há posts a serem exibidos.';
}

mysqli_close($conn); // fechar a conexão com o banco de dados
?>