<?php 

	include "conexao.php";
	mysqli_select_db ($connect, $banco) or die ('Erro!');

	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$status = 1;

	if (($nome == "" || $nome == null) || ($descricao == "" || $descricao == null)) {
		echo "<script type ='text/javascript'>
			alert('Todos os campos devem ser preenchidos!');
			window.location.href='voltar_animal.html';</script>";
	}

	else{
		if(isset($_POST['voltar'])){
		$sql = "UPDATE `animal` SET `status` = '$status', `descricao` = '$descricao' WHERE `animal`.`nome` = '$nome'";

		if(mysqli_query($connect, $sql)) {
				echo "<script type ='text/javascript'>
				alert('Disponibilizado com sucesso!');
				window.location.href='animais_apaf.php';</script>";
			}

			else{
				 echo "<script type ='text/javascript'>
				 alert('Erro ao disponibilizar!');
				window.location.href='voltar_animal.html';</script>";
			}
		}
	}

?>