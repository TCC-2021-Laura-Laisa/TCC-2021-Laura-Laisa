<?php

	include "conexao.php";

	mysqli_select_db ($connect, $banco) or die ('Erro!');

	$evento = $_POST['evento'];
	$evento_atualizado = $_POST['evento_atualizado'];
  	$descricao = $_POST['descricao'];
  	$arquivo = $_FILES;

	//instrução Sql
	$query_select= "SELECT * FROM `evento` WHERE `nome` LIKE '$evento'";

	//consulta um usuario já inserido no banco
	$select = mysqli_query($connect,$query_select);

	$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
	$nome = $_FILES['arquivo']['name'];

	  // Pega a extensão
	$extensao = strrchr($nome, '.');

	  // Converte a extensão para minúsculo
	$extensao = strtolower($extensao);

	//retorna a quantidade de linhas encontradas
	$row = mysqli_num_rows($select);
		
		if ($row == 1){

		if (($evento == "" || $evento == null)||($evento_atualizado == "" || $evento_atualizado == null)){

			echo "<script type ='text/javascript'>
			alert('Todos os campos devem ser preenchidos!');
			window.location.href='atualizar_evento.html';</script>";
	}
	else{

    if(strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

      $novo_nome = md5(microtime()) . '.' . $extensao;
      $destino = 'imagens/' . $novo_nome;
      $foto = $novo_nome;

      if(@move_uploaded_file($arquivo_tmp, $destino)){

      }

      else{
        echo "<script type='text/javascrit'> 
        alert('Erro ao atualizar!');
        window.location.href='atualizar_evento.html';
        </script>";
      }
    }
}
}

    // Verifica se foi enviado um arquivo
    if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {

      if(isset($_POST['salvar'])) {

		$sql = "UPDATE `evento` SET `nome` = '$evento_atualizado', `descricao` = '$descricao', `imagem` = '$foto' WHERE `nome` = '$evento'";

		if(mysqli_query($connect, $sql)) {

				echo "<script type ='text/javascript'>
				alert('Evento atualizado!');
				window.location.href='home_apaf.php';</script>";
			}

			else{

				 echo "<script type ='text/javascript'>
				 alert('Erro ao atualizar!');
				window.location.href='atualizar_evento.html';</script>";
			}
		}
	}

	else{
		echo "<script type='text/javascript'>alert('Evento não encontrado!');
		   location.href='atualizar_evento.html';</script>";
	}

?>