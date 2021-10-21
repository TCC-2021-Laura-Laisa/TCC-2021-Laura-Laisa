<?php

  include ("conexao.php");

  mysqli_select_db ($connect, $banco) or die ('Erro!');

  $animal = $_POST['nome'];
  $especie = $_POST['especie'];
  $sexo = $_POST['sexo'];
  $porte = $_POST['porte'];
  $raca = $_POST['raca'];
  $descricao = $_POST['descricao'];
  $arquivo = $_FILES;
  $status = 1;

  $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
  $nome = $_FILES['arquivo']['name'];

  // Pega a extensão
  $extensao = strrchr($nome, '.');

  // Converte a extensão para minúsculo
  $extensao = strtolower($extensao);

  if(($animal == "" || $animal == null) || ($especie == "Selecione uma espécie") || ($sexo == "Selecione um sexo") || ($porte == "Selecione um porte") || ($raca == "Selecione uma raça")) {

    echo "<script type = 'text/javascript'> 
    alert('Os campos obrigatórios (*) devem ser preenchidos!');
    window.locaion.href='cadastrar_animal.html';
    </script>";
  }

  else if(strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

      $novo_nome = md5(microtime()) . '.' . $extensao;
      $destino = 'imagens/' . $novo_nome;
      $foto = $novo_nome;

      if(@move_uploaded_file($arquivo_tmp, $destino)){

      }

      else{
        echo "<script type='text/javascrit'> 
        alert('Erro ao cadastrar!');
        window.location.href='cadastrar_animal.html';
        </script>";
      }
    }

    // Verifica se foi enviado um arquivo
    if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {

      if(isset($_POST['salvar'])) {

          $sql = "INSERT INTO `animal` (`id_animal`, `descricao`, `nome`, `imagem`, `status`, `sexo`, `raca`, `porte`, `especie` ) VALUES (null, '$descricao', '$animal', '$foto', '$status', '$sexo', '$raca', '$porte', '$especie')";

          if(mysqli_query($connect, $sql)) {

            echo "<script type ='text/javascript'>
            alert('Animal cadastrado com sucesso!');
            window.location.href='cadastrar_animal.html';
            </script>";
          }
      
        else{
          echo "<script type ='text/javascript'>
          alert('Nenhum arquivo anexado!');
          window.location.href='cadastrar_animal.html';
          </script>";
        }
      }
  }

?>