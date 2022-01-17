<?php

  include ("../../conexao.php");

  mysqli_select_db ($connect, $banco) or die ('Erro!');

  $evento = $_POST['evento'];
  $descricao = $_POST['descricao'];
  $arquivo = $_FILES;
  $status = 1;

  $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
  $nome = $_FILES['arquivo']['name'];

  // Pega a extensão
  $extensao = strrchr($nome, '.');

  // Converte a extensão para minúsculo
  $extensao = strtolower($extensao);

  if(($evento == "" || $evento == null)) {

    echo "<script type = 'text/javascript'> 
    alert('O campo 'Evento'deve ser preenchido!');
    window.locaion.href='cadastrar_evento.html';
    </script>";
  }

  else{

    if(strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

      $novo_nome = md5(microtime()) . '.' . $extensao;
      $destino = '../../imagens/' . $novo_nome;
      $foto = $novo_nome;

      if(@move_uploaded_file($arquivo_tmp, $destino)){

      }

      else{
        echo "<script type='text/javascrit'> 
        alert('Erro ao cadastrar!');
        window.location.href='cadastrar_evento.html';
        </script>";
      }
    }

    else{
      echo "<script type='text/javascript'>
      alert('Você poderá enviar apenas arquivos .jpg;.jpeg;.gif;.png');
         window.location.href='cadastrar_evento.html';
         </script>";
    }

    // Verifica se foi enviado um arquivo
    if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {

      if(isset($_POST['salvar'])) {

        $sql = "INSERT INTO `evento` (`id_evento`, `nome`, `descricao`, `imagem`, `status`) VALUES (null, '$evento', '$descricao', '$foto', '$status')";

        if(mysqli_query($connect, $sql)) {

          echo "<script type ='text/javascript'>
          alert('Evento cadastrado com sucesso!');
          window.location.href='cadastrar_evento.html';
          </script>";
        }

        else{

          echo "<script type ='text/javascript'>
          alert('Erro ao cadastrar!');
          window.location.href='cadastrar_evento.html';
          </script>";
        }
      }
    }

    else{

      echo "<script type='text/javascript'>
      alert('Nenhum arquivo anexado!');
      window.location.href='cadastrar_evento.html';
      </script>";
    }
  }



?>