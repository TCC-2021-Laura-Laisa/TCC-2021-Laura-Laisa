<?php  

	include "conexao.php";
	    
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
	$data_adocao = $_POST['data_adocao'];
	$nome_animal = $_POST['nome_animal'];

	mysqli_select_db ($connect, $banco) or die ('Erro!');

	if(($nome == "" || $nome == null) || ($email == "" || $email == null) || ($contato == "" || $contato == null) || ($cpf == "" || $cpf == null) || ($identidade == "" || $identidade == null) || ($cidade == "" || $cidade == null) || ($bairro == "" || $bairro == null) || ($rua == "" || $rua == null) || ($numero == "" || $numero == null) || ($nome_animal == "" || $nome_animal == null)){
		
		echo "<script type ='text/javascript'>
		alert('Todos os campos obrigatórios (*) devem ser preenchidos!');
		window.location.href='formulario.html';</script>";
	} 

	else{
		if(isset($_POST['salvar'])) {

		// $consulta = "SELECT `id_animal` FROM `animal` WHERE `nome` = '$nome_animal'";
		// $id_animal = mysqli_query($connect, $consulta);
		// $data_adocao = implode("-",array_reverse(explode("-",$data_adocao)));

        $sql = "INSERT INTO `adocao` (`id_adocao`, `nome`, `email`, `contato`, `cpf`, `rg`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `nome_animal`, `data_adocao`) VALUES (null, '$nome', '$email', '$contato', '$cpf', '$identidade', '$cidade', '$bairro', '$rua', '$numero', '$complemento', '$nome_animal','$data_adocao')";

        if(mysqli_query($connect, $sql)) {

          echo "<script type ='text/javascript'>
          alert('Formulário enviado com sucesso!');
          window.location.href='formulario.html';
          </script>";
        }

        else{
          echo "<script type ='text/javascript'>
          alert('Erro ao enviar formulario!');
          window.location.href='formulario.html';
          </script>";
        }
      }
}
?>
