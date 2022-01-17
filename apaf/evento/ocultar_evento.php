<?php 

	include "../../conexao.php";
	mysqli_select_db ($connect, $banco) or die ('Erro!');

	$nome = $_POST['nome'];
	$status = 0;

	if ($nome == "" || $nome == null) {
		echo "<script type ='text/javascript'>
			alert('O evento deve ser selecionado!');
			window.location.href='ocultar_evento_pagina.php';</script>";
	}

	else{
		if(isset($_POST['ocultar'])){
		$sql = "UPDATE `evento` SET `status` = '$status'  WHERE `nome` = '$nome'";

		if(mysqli_query($connect, $sql)) {
				echo "<script type ='text/javascript'>
				alert('Evento ocultado com sucesso!');
				window.location.href='../home_apaf.php';</script>";
			}

			else{
				 echo "<script type ='text/javascript'>
				 alert('Erro ao ocultar!');
				window.location.href='ocultar_evento_pagina.php';</script>";
			}
		}
	}

?>