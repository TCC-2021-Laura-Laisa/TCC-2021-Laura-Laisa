<?php
    include("../../conexao.php");
    $consulta = "SELECT * FROM animal"; 
    mysqli_select_db ($connect, $banco) or die ('Erro!');
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="sortcut icon" href="../../imagens/icone_pata.png" type="image/gif"/>
        <title>APAF</title>
        <link rel="stylesheet" type="text/css" href="../../estilo.css">
    </head>
    <form action="atualizar_animal.php" method="POST" enctype="multipart/form-data"/>
    <!-- Classe para marcar a página atual -->
    <body class="">
    <div class="topo">
        <div class="cabecalho">
            <img src="../../imagens/logo_esquerda.jpeg">
            <p class="nome">
                <b> APAF </b>
                <br> Associação Protetora de Animais de Formiga-MG
            </p>
        </div>
    </div>
    <div class="conteudo">
        <div class="coluna_esquerda">
            <div class="acesso">
                <h2> Acesse </h2>
                <div class="navegacao">
                    <ul>
                        <li>
                            <a id="home" href="../home_apaf.php"> Home </a>
                        </li>
                        <li>
                            <a id="animais" href="animais_apaf.php"> Animais </a>
                        </li>
                        <li>
                            <a id="cadastrar_evento" href="../evento/cadastrar_evento.html"> Cadastrar Evento </a>
                        </li>
                        <li>
                            <a id="atualizar_evento" href="../evento/atualizar_evento_pagina.php"> Atualizar Evento </a>
                        </li>
                        <li>
                            <a id="ocultar_evento" href="../evento/ocultar_evento_pagina.php"> Ocultar Evento </a>
                        </li>
                        <li>
                            <a id="historico_evento" href="../evento/historico_evento.php"> Histórico de Evento </a>
                        </li>
                        <li>
                            <a id="cadastrar_animal" href="cadastrar_animal.html"> Cadastrar Animal </a>
                        </li>
                        <li>
                            <a id="atualizar_animal" href="atualizar_animal_pagina.php"> Atualizar Animal </a>
                        </li>
                        <li>
                            <a id="remover_animal" href="remover_animal_pagina.php"> Remover Animal </a>
                        </li>
                        <li>
                            <a id="historico_animal" href="historico_animal.php"> Histórico de Animal </a>
                        </li>
                        <li>
                            <a id="historico_adocao" href="../historico_adocao.php"> Histórico de Adoções </a>
                        </li>
                        <li>
                            <a id="adotantes" href="../adotantes.php"> Adotantes </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="coluna_direita">
            <div>
                <h2> Atualizar Animal </h2>
                <div class="login">
                    <form action="atualizar_animal.php" method="POST" enctype="multipart/form-data">
                        <h4> Nome: <b style="color: #2A804F"> * </b> </h4>
                       <select type="text" name="nome" id="nome" style="width: 300px; height: 25px;">  
                            <option> Selecione um animal </option>

                        <?php

                            include "../../conexao.php";
                        
                            mysqli_select_db ($connect, $banco) or die ('Erro!');

                            $status = 1;

                            $query = sprintf("SELECT * FROM `animal` WHERE `status` = '$status'");
                            $dados = mysqli_query( $connect, $query) or die('Erro ao executar a query');
                            $linha = mysqli_fetch_assoc($dados);
                            $total = mysqli_num_rows($dados);

                     
                            if($total > 0) {

                            // inicia o loop que vai mostrar todos os dados
                            do {
                        
                        ?>
                             
                        <option>
                            <?=$linha['nome']?>
                        </option> 
                                
                        <?php }

                        while($linha = mysqli_fetch_assoc($dados)); 
                        
                        } 

                        ?>

                    </select> 
                        <br>

                        <h4> Novo nome: <b style="color: #2A804F"> * </b> </h4>
                        <input type="text" name="nome_atualizado" id="nome_atualizado" style="width: 300px; height: 25px;">
                        <br>

                        <h4> Espécie: <b style="color: #2A804F"> * </b> </h4>
                        <select value="" type="text" name="especie" id="especie" style="width: 300px; height: 25px;">
                            <option value=""> Selecione uma espécie </option>
                            <option value="1"> Canina </option>
                            <option value="2"> Felina </option>
                        </select>
                        <br>

                        <h4> Sexo: <b style="color: #2A804F"> * </b> </h4>
                        <select  value="" type="text" name="sexo" id="sexo" style="width: 300px; height: 25px;">
                            <option value=""> Selecione um sexo </option>
                            <option value="1"> Macho </option>
                            <option value="2"> Fêmea </option>
                        </select>
                        <br>

                        <h4> Porte: <b style="color: #2A804F"> * </b> </h4>
                        <select  value="" type="text" name="porte" id="porte" style="width: 300px; height: 25px;">
                            <option value=""> Selecione um porte </option>
                            <option value="1"> Pequeno </option>
                            <option value="2"> Médio </option>
                            <option value="3"> Grande </option>
                        </select>
                        <br>

                        <h4> Raça: <b style="color: #2A804F"> * </b> </h4>
                        <select  value="" type="text" name="raca" id="raca" style="width: 300px; height: 25px;">
                            <option value=""> Selecione uma raça </option>
                            <option value="1"> Vira-lata </option>
                        </select>
                        <br>

                        <h4> Descrição: </h4>
                        <input type="text" name="descricao" id="descricao" style="width: 300px; height: 50px;">
                        <br>

                        <h4> Imagem: <b style="color: #2A804F"> * </b> </h4>
                        <input type="file" name="arquivo">

                        <br> <br>
                        <input type="submit" name="atualizar" value="Atualizar" id="atualizar" style="width: 100px; height: 30px; border-radius: 7px;" class="logar">
                        <br> <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="rodape" style="clear: both">
        <br>
        Desenvolvedor(a): Laura Laísa da Silva Mendonça <br>
        Contato: lauralaisa1410@gmail.com <br>
        Instituição: Instituto Federal de Educação, Ciência e Tecnologia de Minas Gerais - <i>Campus</i> Formiga <br>
    </div>
    </body>
</html>