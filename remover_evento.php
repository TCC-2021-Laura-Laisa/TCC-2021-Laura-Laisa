<?php

	include "conexao.php";

	mysqli_select_db ($connect, $banco) or die ('Erro!');

	$evento = $_POST['evento'];

	//instrução Sql
	$query_select= "SELECT * FROM `evento` WHERE `nome` LIKE '$evento'";

	//consulta um usuario já inserido no banco
	$select = mysqli_query($connect,$query_select);

	//retorna a quantidade de linhas encontradas
	$row = mysqli_num_rows($select);

		if ($evento == "" || $evento == null){

			echo "<script type ='text/javascript'>
			alert('Todos os campos devem ser preenchidos!');
			window.location.href='remover_evento.html';</script>";
	}
	else{

      if(isset($_POST['salvar'])) {

		$sql = "DELETE `evento` WHERE `id_evento` = '$id'";

		if(mysqli_query($connect, $sql)) {

				echo "<script type ='text/javascript'>
				alert('Evento removido!');
				window.location.href='home_apaf.php';</script>";
			}

			else{

				 echo "<script type ='text/javascript'>
				 alert('Erro ao remover!');
				window.location.href='remover_evento.html';</script>";
			}
		}
	}

?>