<?php
// Dados do post
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$conteudo = $_POST['conteudo'];
$imagem = $_FILES['imagem']['tmp_name'];
$tamanho = $_FILES['imagem']['size'];

// Conexão com o banco de dados (substitua os valores pelos seus próprios)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudaenem";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Falha na conexão: " . mysqli_connect_error());
}

// Inserção do post na tabela "posts"

$fp = fopen($imagem, "rb");
$conteudo1 = fread($fp, $tamanho);
$conteudo1 = addslashes($conteudo1);
fclose($fp);

$sql = "INSERT INTO fisica (titulo, subtitulo, conteudo, imagem) VALUES ('$titulo', '$subtitulo', '$conteudo', '$conteudo1')";
if (mysqli_query($conn, $sql)) {
    echo"<script>console.log('gg');</script>";
    header("location: ../htmls/fisica.php");
} else {
  echo "Erro ao criar o post: " . mysqli_error($conn);
}

mysqli_close($conn);
?>