<?php

	// Dados para conexao
	$servidor= "localhost";  
	$usuario= "root";        
	$senha="";            
	$banco="tcc";

	// Conexão
	$connect = mysqli_connect($servidor, $usuario, $senha) or die ("Erro na seleção do banco!");

	/* Teste de conexão
	
	if (!$connect) {
		die('Nao conectou! - ' .mysql_error());
	}
	else {
		echo 'Conectou!';
	}
	
	*/
	
?>