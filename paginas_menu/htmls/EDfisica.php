<?php

$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "estudaenem"; 
$conn = mysqli_connect($host, $user, $password, $database);

session_start();

if(isset($_POST['email']) && isset($_POST['senha'])){

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $sql = "SELECT * FROM conta1 WHERE email='$email' AND senha='$senha'";
  $result = mysqli_query($conn, $sql);
  $rowimg = mysqli_fetch_assoc($result);

  $sql2 = "SELECT * FROM conta2 WHERE email='$email' AND senha='$senha'";
  $result2 = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_assoc($result2);

  if (mysqli_num_rows($result) > 0) {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['senha'] = $_POST['senha'];
    $_SESSION['teste'] = mysqli_num_rows($result);
  }else if(mysqli_num_rows($result2) > 0){
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['senha'] = $_POST['senha'];
    $_SESSION['teste2'] = mysqli_num_rows($result2);
    $adm = 1;
  }else{
    session_abort();
    echo "<script>alert('Email ou senha incorretos');</script>";
  }
}

if (isset($_SESSION['email'])) {
  if(!isset($_SESSION['teste'])){
    $_SESSION['teste'] = 0;
  }
  if(!isset($_SESSION['teste2'])){
    $_SESSION['teste2'] = 0;
  }
  if ($_SESSION['teste'] > 0) {
    
    $user = 'true';
    
  } else if($_SESSION['teste2'] > 0){
    $user = 'false';

  }else{
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
  <link rel="stylesheet" href="../css/EDfisica.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <!-- logo abaixo está o código html do CABEÇALHO -->
  <header>
    <div class="container.logo">
      <div class="logo.txr">
        <a href="../../index.php"><img src="./img/logosemfundo.png" class="logosemfundo"></a>
      </div>
    </div>
    <div class="slrmane">
      <h6>Aqui você verá os conteúdos que já cairam no Enem!</h6>
    </div>
    <div class="menu">
      <ul>
        <?php
          if($user == 'false'){
            echo "
            <script>
                console.log('administrador');
            </script>
            ";
            echo "
            
            <button onclick='mostraMenu2()' id='btnn'><img src='./img/add.png' class='eng111'></button></a>
            <fieldset id='meuMenu'>
                <form action='../add/EDfisica.php' enctype='multipart/form-data' method='POST'>
                  <input type='text' name='titulo' id='titulo' maxlength='4' placeholder='ano'><br><br>
                  <input type='text' name='subtitulo' id='subtitulo' placeholder='titulo'><br><br>
                  <textarea name='conteudo' id='conteudo' placeholder='conteudo'></textarea><br><br>
                  <input type='hidden' name='MAX_FILE_SIZE' value='99999999'/>
                  <input type='file' name='imagem' id='imagem'>
                  <input type='submit' value='ADICIONAR'><br><br>
                </form>
            </fieldset>
            <div class='adms'>
              <a href='./paginas/html/editarcontas.php'><button onclick='mostraMenuEdital()' id='btnn11ED'><img src='./img/contas.png' class='contasED'></button></a>
              <button onclick='mostraMenu()' id='btnn11'><img src='./img/add.png' class='eng'></button>
              <button onclick='editar()' id='btnn22' ><img src='./img/lapis.png' class='eng2'></button>
              <button onclick='editar1()' id='btnn11122' ><img src='./img/lapis.png' class='eng1222'></button>
              <fieldset id='menu1'>
                <form method='post' action='./mudarconteudo/mudar_edfisica.php'>
                  <label for='subtitulo'>titulo:</label>
                  <input type='text' id='subtitulo' name='subtitulo'><br><br>                
                  <label for='titulo'>ano:</label>
                  <input type='text' id='titulo' name='titulo'><br><br>                  
                  <label for='conteudo'>Conteúdo:</label>
                  <textarea id='conteudo' name='conteudo'></textarea><br><br>
                  <input type='submit' name='submit' value='Atualizar'>
                  <input type='submit' name='apagar' value='Apagar'>
                </form>
              </fieldset>
              <a href='./paginas/html/logout.php'><button id='btnn22LG'><img src='./img/logout.png' class='eng3'></button></a>
            </div>
        ";
        }else if($user == 'true'){
          echo "
          <script>
            console.log('usuario');
          </script>
          ";
      
        }else{
          echo "<a href='./paginas/html/login.php' class='lgg'>login</a>";
        }  
        ?>
      </ul>
    </div>
  </header>
  <!-- Aqui inicia o código do menu drop-down  -->

  <?php include '../PHP/EDfisica_post.php'; ?>
  <script src="./js/script.js"></script>
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
  <h5>
    VITOR HUGO<br>
    MARCONDES-
    LAYSLA<br>
    NAELY-
    RAUL<br>
    LUCAS FEITOSA
  </h5>
</footer>
</html>