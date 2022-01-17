<?php 

	include "../../conexao.php";
	mysqli_select_db ($connect, $banco) or die ('Erro!');

	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$status = 0;

	if (($nome == "" || $nome == null) || ($descricao == "" || $descricao == null)) {
		echo "<script type ='text/javascript'>
			alert('Todos os campos devem ser preenchidos!');
			window.location.href='remover_animal_pagina.php';</script>";
	}

	else{
		if(isset($_POST['remover'])){
		$sql = "UPDATE `animal` SET `status` = '$status', `descricao` = '$descricao' WHERE `animal`.`nome` = '$nome'";

		if(mysqli_query($connect, $sql)) {
				echo "<script type ='text/javascript'>
				alert('Removido com sucesso!');
				window.location.href='animais_apaf.php';</script>";
			}

			else{
				 echo "<script type ='text/javascript'>
				 alert('Erro ao remover!');
				window.location.href='remover_animal_pagina.php';</script>";
			}
		}
	}

?>