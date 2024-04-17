<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "estudaenem";
$conn = mysqli_connect($host, $user, $password, $database);

$adm = 0;

session_start();

if (isset($_POST['email']) && isset($_POST['senha'])) {
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['senha'] = $_POST['senha'];
} else {
  if (isset($_SESSION['email']) && isset($_SESSION['senha'])) {
    $_SESSION['email'] = $_SESSION['email'];
    $_SESSION['senha'] = $_SESSION['senha'];
  } else {
    $_SESSION['email'] = null;
    $_SESSION['senha'] = null;
  }
}

if (isset($_SESSION['email']) && isset($_SESSION['senha'])) {

  $email = $_SESSION['email'];
  $senha = $_SESSION['senha'];

  $sql = "SELECT * FROM conta1 WHERE email='$email' AND senha='$senha'";
  $result = mysqli_query($conn, $sql);
  $rowimg = mysqli_fetch_assoc($result);

  $sql2 = "SELECT * FROM conta2 WHERE email='$email' AND senha='$senha'";
  $result2 = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_assoc($result2);

  if (mysqli_num_rows($result) > 0) {

    $sql = "SELECT * FROM conta1 WHERE email='$email'"; // Alteração aqui
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      die('Erro na consulta SQL: ' . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        // Exibir a imagem
        $imagem = $row["imagem"];

        echo '<div onclick="fildperfil()" id="foto_perfil_menu"><img class="foto_perfil" src="data:image/jpg;base64, ' . base64_encode($imagem) . '" /></div>';
        echo '
          <fieldset id="fieldset_perfil">
            <ul>
              <li><a href="./paginas/html/gerenciar_conta.php" class="link">GERENCIAR SUA CONTA</a></li>
              <li><a href="./paginas/html/login.php" class="link">MUDAR DE CONTA</a></li>
            </ul>
          <button onclick="fechar()" id="fechar"><img src="./img/fechar.svg" class="fechar_img"></button>
          </fieldset>';
      }
    }

    $_SESSION['teste'] = mysqli_num_rows($result);
  } else if (mysqli_num_rows($result2) > 0) {
    $_SESSION['email'] = $_SESSION['email'];
    $_SESSION['senha'] = $_SESSION['senha'];
    $_SESSION['teste2'] = mysqli_num_rows($result2);

    $sql = "SELECT * FROM conta2 WHERE email='$email'"; // Alteração aqui
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      die('Erro na consulta SQL: ' . mysqli_error($conn));
    }

    $user = 'false';

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        // Exibir a imagem
        $imagem = $row["imagem"];

        echo '<div onclick="fildperfil()" id="foto_perfil_menu"><img class="foto_perfil" src="data:image/jpg;base64, ' . base64_encode($imagem) . '" /></div>';
        echo '
        <fieldset id="fieldset_perfil">
          <ul>
            <li><a href="./paginas/html/gerenciar_conta.php" class="link">GERENCIAR SUA CONTA</a></li>
            <li><a href="./paginas/html/login.php" class="link">MUDAR DE CONTA</a></li>
          </ul>
        <button onclick="fechar()" id="fechar"><img src="../../img/fechar.svg" class="fechar_img"></button>
        </fieldset>';
      }

      
    }

    $adm = 1;
  } else {
    session_abort();
    echo "<script>alert('Email ou senha incorretos');</script>";
  }
}

if (isset($_SESSION['email'])) {
  if (!isset($_SESSION['teste'])) {
    $_SESSION['teste'] = 0;
  }
  if (!isset($_SESSION['teste2'])) {
    $_SESSION['teste2'] = 0;
  }
  if ($_SESSION['teste'] > 0) {
    $user = 'true';
  } else if ($_SESSION['teste2'] > 0) {
  } else {
    echo "<script>
      alert('email ou senhas incorretos')
    </script>";
    header('location: ./paginas/html/login.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>EstudaEnem</title>
  <link rel="stylesheet" href="../css/quimica.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <header>
    <div class="container.logo">
      <div class="logo.txr">
        <img src="../../img/estudaenem-logo-removebg-preview.png" class="logosemfundo">
      </div>
    </div>
    <div class="div_titulo_h6">
      <h6>Aqui você verá os conteúdos que já caíram no Enem!</h6>
    </div>
    <div class="menu">
      <ul>
        <?php
        if ($adm == 1) {
          echo "
              <button onclick='mostraMenu2()' id='btn_adicionar'><img src='../../img/add.svg' id='img_adicionar'></button></a>
              <fieldset id='meuMenu'>
                  <h2>ADICIONE O CONTEÚDO</h2><br>
                  <div class='formulario'>
                    <form action='../add/quimica.php' enctype='multipart/form-data' method='POST'>
                      <input type='text' name='titulo' id='titulo' class='input_titulo' maxlength='4' placeholder='ano'><br><br>
                      <input type='text' name='subtitulo' id='subtitulo' class='input_subtitulo' placeholder='titulo'><br><br>
                      <textarea name='conteudo' id='conteudo' class='input_conteudo' placeholder='conteudo'></textarea><br><br>

                      <input type='hidden' name='MAX_FILE_SIZE' value='99999999'><br>
                      <label for='arquivo'><img src='../../img/add.svg' class='add'></label>
                      <p class='texto'>Adicionar Imagem</p>
                      <input type='file' name='imagem' id='arquivo'><br>

                      <input type='submit' value='ADICIONAR' class='btn'><br><br>
                    </form>
                  </div>
              </fieldset>
              <a href='./paginas/html/exibir_registros.php'><button onclick='mostraMenuEdital()' id='contas_btn'><img src='../../img/contas.png' id='contas_img'></button></a>
        
              ";
        } else if ($adm != 1) {
          echo "
          <script>
            console.log('usuario');
          </script>
          ";
        } else {
          echo "<a href='./paginas/html/login.php' class='botao_login_principal'>login</a>";
        }
        ?>
      </ul>
    </div>
  </header>
  <nav class="dp-menu">
    <ul class="ul1">
      <li><a id="conteudo" href="" class="humanas">Humanas</a>
        <ul>
          <li><a id="dp-c" href="./paginas_menu/htmls/historia.php">História</a></li>
          <li><a id="dp-c" href="paginas_menu/htmls/geografia.php">Geografia</a></li>
          <li><a id="dp-c" href="paginas_menu/htmls/filosofia.php">Filosofia</a></li>
          <li><a id="dp-c" href="paginas_menu/htmls/sociologia.php">Sociologia</a></li>
        </ul>
      <li><a id="conteudo" href="" class="natureza">Natureza</a>
        <ul>
          <li><a id="dp-c" href="paginas_menu/htmls/quimica.php">Quimica</a></li>
          <li><a id="dp-c" href="paginas_menu/htmls/fisica.php">Fisica</a></li>
          <li><a id="dp-c" href="paginas_menu/htmls/biologia.php">Biologia</a></li>
        </ul>
      <li><a id="conteudo" href="" class="linguagens">Linguagens</a>
        <ul>
          <li><a id="dp-c" href="paginas_menu/htmls/EDfisica.php">ED.Fisica</a></li>
          <li><a id="dp-c" href="paginas_menu/htmls/portugues.php">Português</a></li>
          <li><a id="dp-c" href="paginas_menu/htmls/artes.php">Artes</a></li>
          <li><a id="dp-c" href="paginas_menu/htmls/ingles.php">Ingles</a>
          <li><a id="dp-c" href="paginas_menu/htmls/espanhol.php">Espanhol</a>
          </li>
        </ul>
      <li><a id="conteudo" href="paginas_menu/htmls/matematica.php" class="matematica">Matemática</a></li>
      <li><a id="conteudo" href="https://ead.ucs.br/blog/temas-de-redacao-para-enem" class="temas">Tema de
          redações</a></li>
      <li><a id="conteudo" href="https://guiadoestudante.abril.com.br/enem/prepare-se-para-o-enem-refazendo-provas-anteriores/" class="redacoes">Redações</a></li>
      </li>
    </ul>
  </nav>
  </center>
  <!-- Aqui finaliza o código do menu drop-down  -->
  <?php include '../PHP/quimica_post.php'; ?>
  <script src="../js/conteudos.js"></script>
</body>
<footer>
  <h3>
    FALE CONOSCO:<br>
    tel: (21) 8002-8922<br>
    email: estudaeenem@empresa.ce.gov.br
  </h3>
  <div class="meio">
    <h4>ESTUDAENEM</h4>
  </div>
</footer>
<script>
  var funperfil = document.getElementById("fieldset_perfil");
  var contador = 0;

  function fildperfil() {


    contador++;

    if (contador === 1) {
      funperfil.style.display = "flex";
    } else if (contador === 2) {
      funperfil.style.display = "none";
      contador = 0
    }

  }
</script>
<script href="../js/conteudos.js"></script>

</html>
