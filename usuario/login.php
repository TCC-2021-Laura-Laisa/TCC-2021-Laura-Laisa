<?php
	//Obtem os valores do formulario
	$nome = $_POST['nome'];
	$senha = $_POST['senha'];

	//Verifica se há campos não preenchidos
	if (empty ($nome) || empty ($senha)){
	    echo"<script type='text/javascript'>
	    alert('Os campos usuário e senha devem ser preenchidos!');
		window.location.href='login.html';</script>";
	}

	if ($nome == 'APAF' && $senha == 'apaf123') {
		echo "<script type='text/javascript'>
	    window.location.href='../apaf/home_apaf.php';</script>";
	}

	else{
		echo "<script type='text/javascript'>
	    alert('Os campos usuário e senha estão incorretos!');
		window.location.href='login.html';</script>";
	}
?>
