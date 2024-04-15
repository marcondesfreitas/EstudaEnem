<?php
	//Conectar ao banco de dados
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "estudaenem";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	//Verificar conexão
	if (!$conn) {
		die("Falha na conexão: " . mysqli_connect_error());
	}

	if(isset($_POST['submit'])) {
		$subtitulo = $_POST['subtitulo'];
		$titulo = $_POST['titulo'];
		$conteudo = $_POST['conteudo'];

		//Atualizar os valores
		$sql = "UPDATE filosofia SET titulo='$titulo', conteudo='$conteudo' WHERE subtitulo='$subtitulo'";

		if (mysqli_query($conn, $sql)) {
			echo "Dados atualizados com sucesso!";
		} else {
			echo "Erro ao atualizar dados: " . mysqli_error($conn);
		}
	}

    if(isset($_POST['apagar'])) {
		$subtitulo = $_POST['subtitulo'];

		//Apagar os valores
		$sql = "DELETE FROM filosofia WHERE subtitulo='$subtitulo'";

		if (mysqli_query($conn, $sql)) {
			echo "Dados apagados com sucesso!";
		} else {
			echo "Erro ao apagar dados: " . mysqli_error($conn);
		}
	}

	//Fechar conexão
	mysqli_close($conn);
	?>