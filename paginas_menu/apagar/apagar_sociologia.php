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

// Verificar se o ID do post foi recebido
if(isset($_POST['id'])) {
  $id = $_POST['id'];

  // Executar a exclusão do post no banco de dados
  $sql = "DELETE FROM sociologia WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    header("location: ../htmls/sociologia.php");
  } else {
    echo "Erro ao excluir o post: " . mysqli_error($conn);
  }
 
}

mysqli_close($conn); // fechar a conexão com o banco de dados
?>