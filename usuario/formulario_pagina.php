<?php
    include("../conexao.php");
    $consulta = "SELECT * FROM animal"; 
    mysqli_select_db ($connect, $banco) or die ('Erro!');
?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="sortcut icon" href="../imagens/icone_pata.png" type="image/gif"/>
    <title>APAF</title>
    <link rel="stylesheet" type="text/css" href="../estilo.css">
    <script src="../javascript.js"></script>
</head>
<form action="formulario.php" method="POST" enctype="multipart/form-data"/>
<!-- Classe para marcar a página atual -->
<body class="">
<div class="topo">
        <div class="cabecalho">
            <img src="../imagens/logo_esquerda.jpeg">
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
                        <a id="home" href="index.php"> Home </a>
                    </li>
                    <li>
                        <a id="animais" href="animais.php"> Animais </a>
                    </li>
                    <li>
                        <a id="adotar" href="formulario_pagina.php"> Adotar </a>
                    </li>
                    <li>
                        <a id="login" href="login.html"> Login </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="coluna_direita">
        <div>
            <h2> Formulário de Adoção </h2>
            <div class="login">
                <form action="formulario.php" method="POST" enctype="multipart/form-data">
                    <h4> Nome completo: <b style="color: #2A804F"> * </b> </h4>
                    <input type="text" name="nome" id="nome" style="width: 300px; height: 25px;">
                    <br>

                    <h4> E-mail: <b style="color: #2A804F"> * </b> </h4>
                    <input type="text" name="email" id="email" style="width: 300px; height: 25px;">
                    <br>

                    <h4> Telefone/Celular: <b style="color: #2A804F"> * </b> </h4>
                    <input type="text" class="form-control cel-ddd-mask" placeholder="(00) 00000-0000" name="contato" id="contato" style="width: 300px; height: 25px;">
                    <br>

                    <h4> CPF: <b style="color: #2A804F"> * </b> </h4>
                    <input type="text" class="form-control cpf-mask" placeholder="000.000.000-00" name="cpf" id="cpf" style="width: 300px; height: 25px;">
                    <br>

                    <h4> RG: <b style="color: #2A804F"> * </b> </h4>
                    <input type="text" class="form-control rg-mask" placeholder="XX-00.000.000" name="rg" id="rg" style="width: 300px; height: 25px;">
                    <br>

                    <h4> Cidade: <b style="color: #2A804F"> * </b> </h4>
                    <input type="text" name="cidade" id="cidade" style="width: 300px; height: 25px;">
                    <br>

                    <h4> Bairro: <b style="color: #2A804F"> * </b> </h4>
                    <input type="text" name="bairro" id="bairro" style="width: 300px; height: 25px;">
                    <br>

                    <h4> Rua: <b style="color: #2A804F"> * </b> </h4>
                    <input type="text" name="rua" id="rua" style="width: 300px; height: 25px;">
                    <br>

                    <h4> N°: <b style="color: #2A804F"> * </b> </h4>
                    <input type="text" name="numero" id="numero" style="width: 300px; height: 25px;">
                    <br>

                    <h4> Complemento:</b> </h4>
                    <input type="text" name="complemento" id="complemento" style="width: 300px; height: 25px;">
                    <br>

                    <h4> Animal: <b style="color: #2A804F"> * </b> </h4>
                    <select type="text" name="animal" id="animal" style="width: 300px; height: 25px;">  
                        <option value="">Selecione um animal</option>

                        <?php

                            include "../conexao.php";
                        
                            mysqli_select_db ($connect, $banco) or die ('Erro!');

                            $query = sprintf("SELECT * FROM animal WHERE status = 1");
                            $dados = mysqli_query( $connect, $query) or die('Erro ao executar a query');
                            $linha = mysqli_fetch_assoc($dados);
                            $total = mysqli_num_rows($dados);

                     
                            if($total > 0) {

                            // inicia o loop que vai mostrar todos os dados
                            do {
                        
                        echo "
                             
                        <option value='{$linha['id_animal']}'>
                            {$linha['nome']}
                        </option> 
                                
                        ";
                        }
                        while($linha = mysqli_fetch_assoc($dados)); 
                        
                        } 

                        ?>

                    </select> 

                    <h4> Data: <b style="color: #2A804F"> * </b> </h4>
                    <input type="date" class="form-control date-mask" placeholder="dd/mm/aaaa" name="data" id="data" style="width: 300px; height: 25px;">
                    <br>

                    <h4> Observações:</b> </h4>
                    <input type="text" name="observacoes" id="observacoes" style="width: 300px; height: 50px;">
                    <br>
                    <br> 
                <input type="submit" name="enviar" value="Enviar" id="enviar" style="width: 100px; height: 30px; border-radius: 7px;" class="logar">
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