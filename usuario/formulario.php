<?php  

	include "../conexao.php";
	    
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$contato = $_POST['contato'];
	$cpf = $_POST['cpf'];
	$identidade = $_POST['rg'];
	$cidade = $_POST['cidade'];
	$bairro = $_POST['bairro'];
	$rua = $_POST['rua'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$data = $_POST['data'];
	$observacoes = $_POST['observacoes'];
	$animal = $_POST['animal'];
	$id_animal = intval($animal);
	$status = 0;

	mysqli_select_db ($connect, $banco) or die ('Erro!');

	if(($nome == "" || $nome == null) || ($email == "" || $email == null) || ($contato == "" || $contato == null) || ($cpf == "" || $cpf == null) || ($identidade == "" || $identidade == null) || ($cidade == "" || $cidade == null) || ($bairro == "" || $bairro == null) || ($rua == "" || $rua == null) || ($numero == "" || $numero == null)){
		
		echo "<script type ='text/javascript'>
		alert('Todos os campos obrigatórios (*) devem ser preenchidos!');
		window.location.href='formulario_pagina.php';</script>";
	} 

	else{
		if(isset($_POST['enviar'])) {

        $sql = "INSERT INTO `tcc`.`adocao` (`id_adocao`, `nome`, `email`, `contato`, `cpf`, `rg`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `data`, `status`, `observacoes`, `animal_id_animal`) VALUES (null, '$nome', '$email', '$contato', '$cpf', '$identidade', '$cidade', '$bairro', '$rua', '$numero', '$complemento', '$data', '$status', '$observacoes', '$id_animal')";

        if(mysqli_query($connect, $sql) ) {

          echo "<script type ='text/javascript'>
          alert('Formulário enviado com sucesso!');
          window.location.href='formulario_pagina.php';
          </script>";
        }

        else{
          echo "<script type ='text/javascript'>
          alert('Erro ao enviar formulario!');
          window.location.href='formulario_pagina.php';
          </script>";
        }
      }
	}
?>
