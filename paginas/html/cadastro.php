<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/cadastr.css">
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../img/estudaenem-logo-removebg-preview (1).ico" sizes="1x1">
    <title>CADASTRAR</title>
</head>

<body>
    <fieldset class="fild"><br>
        <fieldset class="fild2">
            <img src="../../img/estudaenem-logo-removebg-preview.png" width="33%" class="logoene">
            <!-- <h2>Bem vindo ao nosso site!</h2>
            <h3>Crie sua conta para desfrutar 100% dos nossos recursos</h3> -->
        </fieldset>
        <fieldset class="fild3">
            <h1><b>Crie sua conta</b></h1>
            <p>......................................................................................</p><br>
            <form method="post" action="../../php/db_cadastro.php" enctype="multipart/form-data">
                <input type="text" id="email" name="email" placeholder="E-mail"><br><br>
                <div class="senhaaa">
                    <input type="password" name="senha" class="senha" placeholder="senha" id="senha" required>
                    <button class="bb" id="bbn" type="button"><img src="../../img/viw.png" alt="" class="imgg"></button>
                </div><br>
                <input type="tel" name="telefone" id="tell" class="telefone" maxlength="15" placeholder="(88) 99999-9999"><br><br><br>
                <label>Foto de Perfil<input class="fotinha" type="file" id="imagem" name="imagem" required></label><br><br>
                <input type="submit" class="btn" value="Enviar"><br><br>
            </form>
            <a class="login-btn" href="./login.php">Já tem sua conta? Faça login aqui.</a>
        </fieldset>
        <div class="imagens">
            <div class="googl"><img src="../../img/logogoogle.png" class="google" alt=""></div>
            <div class="vkk"><img src="../../img/vk.png" class="vk" alt=""></div>
            <div class="fac"><img src="../../img/logofacebook.png" class="facebook" alt=""></div>
        </div>
    </fieldset>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../../js/cadastro.js"></script>
</body>

</html>