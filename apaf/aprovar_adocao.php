<?php 

    include "../conexao.php";
    mysqli_select_db ($connect, $banco) or die ('Erro!');

    $cpf = $_POST['cpf'];
    $status = 1;

        $query_select= "SELECT * FROM `adocao` WHERE `status` = '0'";
        $select = mysqli_query($connect, $query_select);

        if(isset($_POST['aprovar'])){

        $sql = "UPDATE `adocao` SET `status` = '$status' WHERE `cpf` = '$cpf'";

            if(mysqli_query($connect, $sql)) {
                echo "<script type ='text/javascript'>
                alert('Adoção aprovada!');
                window.location.href='home_apaf.php';</script>";
            }

            else{
                 echo "<script type ='text/javascript'>
                 alert('Erro!');
                window.location.href='adotantes.php';</script>";
            }
        }

?>