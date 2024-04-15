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

if (isset($_SESSION['email']) && isset($_SESSION['senha'])) {

  $email = $_SESSION['email'];
  $senha = $_SESSION['senha'];

  $sql2 = "SELECT * FROM conta2 WHERE email='$email' AND senha='$senha'";
  $result2 = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_assoc($result2);

  if (mysqli_num_rows($result2) > 0) {
    $_SESSION['email'] = $_SESSION['email'];
    $_SESSION['senha'] = $_SESSION['senha'];
    $_SESSION['teste2'] = mysqli_num_rows($result2);

    $sql = "SELECT * FROM conta2 WHERE email='$email'"; // Alteração aqui
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      die('Erro na consulta SQL: ' . mysqli_error($conn));
    }
    $adm = 1;

    }
  } 

$sql = "SELECT * FROM pg_index1";
$result = mysqli_query($conn, $sql);
if (!$result) {
  die('Erro na consulta SQL: ' . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    // Exibir a imagem
    $sql = mysqli_query($conn, "SELECT imagem FROM pg_index1");
    if (!$sql) {
      die('Erro na consulta SQL: ' . mysqli_error($conn));
    }
    $imagem = $row["imagem"];

    echo"<div class='tudo'>";

    echo "<div class='materia'>";

    if($adm == 1){
      echo "
        <form action='./paginas/html/editar_conteudo.php' method='post' style='display:inline;'>
          <input type='hidden' name='id' value='" . $row["id"] . "'>
          <button class='editarcont' type='submit'><img class='imagem_editar' src='./img/lapis_conteudo.png' alt='lixeira'></button>
        </form>
        <form action='./paginas/html/apagar_conteudos.php' method='post' style='display:inline;'>
          <input type='hidden' name='id' value='" . $row["id"] . "'>
          <button class='apagarcont' type='submit'><img class='imagem_apagar' src='./img/lixeira_conteudo.png' alt='lixeira'></button>
        </form>
    ";
    }else{
      echo "
      <script>
        console.log('usr')
      </script>
    ";
    }

    echo "
        <p class='titulo_conteudo'>" . $row["titulo"] . "  -  " . $row["subtitulo"] . ":</p>
        <p class='materia_conteudo'>" . $row["conteudo"] . "</p>
      ";

    echo "</div>";

    echo '
      <div class="div_imagem_conteudo">
        <img class="imagem_conteudo" src="data:image/jpg;base64, '. base64_encode($imagem) . '" />
      </div>
    '; 
    echo "</div>";
    echo "<hr class='linha_conteudo'>";
  }
} else {
  echo 'Não há posts a serem exibidos.';
}

mysqli_close($conn); // fechar a conexão com o banco de dados
?>