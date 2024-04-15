<!DOCTYPE html>
<html>
<head>
	<title>Novo Post</title>
</head>
<body>
	<form action="adicionar_post.php" method="POST">
		<label for="titulo">Título:</label>
		<input type="text" name="titulo" id="titulo"><br><br>
		<label for="subtitulo">Subtítulo:</label>
		<input type="text" name="subtitulo" id="subtitulo"><br><br>
		<label for="conteudo">Conteúdo:</label>
		<textarea name="conteudo" id="conteudo"></textarea><br><br>
		<input type="submit" value="Salvar">
	</form>
</body>
</html>