<?php 

    include "../../conexao.php";
    mysqli_select_db ($connect, $banco) or die ('Erro!');

    $nome = $_POST['nome'];
    $status = 1;
    $id_pessoa = 

    if ($nome == "" || $nome == null) {
        echo "<script type ='text/javascript'>
            alert('O evento deve ser selecionado!');
            window.location.href='exibir_evento_pagina.php';</script>";
    }

    else{
        if(isset($_POST['aprovar'])){
        $sql = "UPDATE `adocao` SET `status` = '$status' WHERE `id_pessoa` = '$nome'";

        if(mysqli_query($connect, $sql)) {
                echo "<script type ='text/javascript'>
                alert('Evento exibido com sucesso!');
                window.location.href='../home_apaf.php';</script>";
            }

            else{
                 echo "<script type ='text/javascript'>
                 alert('Erro ao exibir!');
                window.location.href='exibir_evento_pagina.php';</script>";
            }
        }
    }

?>