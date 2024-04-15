<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar o ID do post do campo oculto
    $id = isset($_POST["id"]) ? $_POST["id"] : '';
    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : '';
    $subtitulo = isset($_POST["subtitulo"]) ? $_POST["subtitulo"] : '';
    $conteudo = isset($_POST["conteudo"]) ? $_POST["conteudo"] : '';

    // Conexão com o banco de dados (substitua os valores pelos seus próprios)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "estudaenem";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Atualizar os dados do post no banco de dados
    $sql = "UPDATE historia SET titulo='$titulo', subtitulo='$subtitulo', conteudo='$conteudo' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Erro na edição do post: " . mysqli_error($conn);
    }

    mysqli_close($conn); // fechar a conexão com o banco de dados
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Post</title>
</head>
<body>
    <h1>Editar Post</h1>
    <form action="editar_historia.php" method="post">
    <input type="hidden" name="id" value="<?php echo isset($_POST["id"]) ? $_POST["id"] : ''; ?>">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="<?php echo isset($_POST["titulo"]) ? $_POST["titulo"] : ''; ?>"><br>
        <label for="subtitulo">Subtítulo:</label><br>
        <input type="text" id="subtitulo" name="subtitulo" value="<?php echo isset($_POST["subtitulo"]) ? $_POST["subtitulo"] : ''; ?>"><br>
        <label for="conteudo">Conteúdo:</label><br>
        <textarea id="conteudo" name="conteudo"><?php echo isset($_POST["conteudo"]) ? $_POST["conteudo"] : ''; ?></textarea><br>
        <input type="submit" value="Salvar" name="salvar">
    </form>
</body>
</html>
<?php
    if(isset($_POST["salvar"])){
        header("location: ../htmls/historia.php");
    }
?>