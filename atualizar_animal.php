<?php

	include "conexao.php";

	mysqli_select_db ($connect, $banco) or die ('Erro!');

	$animal = $_POST['nome'];
	$animal_atualizado = $_POST['nome_atualizado'];
	$especie = $_POST['especie'];
	$sexo = $_POST['sexo'];
	$porte = $_POST['porte'];
	$raca = $_POST['raca'];
	$descricao = $_POST['descricao'];
	$arquivo = $_FILES;
	$status = 0;

	//instrução Sql
	$query_select= "SELECT * FROM `animal` WHERE `nome` LIKE '$animal'";

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

		if(($animal == "" || $animal == null) || ($especie == "Selecione uma espécie") || ($sexo == "Selecione um sexo") || ($porte == "Selecione um porte") || ($raca == "Selecione uma raça")) {

    echo "<script type = 'text/javascript'> 
    alert('Os campos 'Nome', 'Espécie', 'Sexo', 'Porte' e 'Raça' devem ser preenchidos!');
    window.locaion.href='atualizar_animal.html';
    </script>";
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
        window.location.href='atualizar_animal.html';
        </script>";
      }
    }
}
}

    // Verifica se foi enviado um arquivo
    if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {

      if(isset($_POST['salvar'])) {

		$sql = "UPDATE `animal` SET `nome` = '$animal_atualizado', `descricao` = '$descricao', `imagem` = '$foto', `sexo` = '$sexo', `especie` = '$especie', `porte` = '$porte', `raca` = '$raca' WHERE `nome` = '$animal'";

		if(mysqli_query($connect, $sql)) {

				echo "<script type ='text/javascript'>
				alert('Animal atualizado!');
				window.location.href='animais_apaf.php';</script>";
			}

			else{

				 echo "<script type ='text/javascript'>
				 alert('Erro ao atualizar!');
				window.location.href='atualizar_animal.html';</script>";
			}
		}
	}

	else{
		echo "<script type='text/javascript'>alert('Animal não encontrado!');
		   location.href='atualizar_animal.html';</script>";
	}

?>