<html>
    <head>
        <meta charset="UTF-8">
        <link rel="sortcut icon" href="../../imagens/icone_pata.png" type="image/gif"/>
        <title>APAF</title>
        <link rel="stylesheet" type="text/css" href="../../estilo.css">
    </head>
    <form action="ocultar_evento.php" method="POST" enctype="multipart/form-data"/>
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
                            <a id="animais" href="../animal/animais_apaf.php"> Animais </a>
                        </li>
                        <li>
                            <a id="cadastrar_evento" href="cadastrar_evento.html"> Cadastrar Evento </a>
                        </li>
                        <li>
                            <a id="atualizar_evento" href="atualizar_evento_pagina.php"> Atualizar Evento </a>
                        </li>
                        <li>
                            <a id="ocultar_evento" href="ocultar_evento_pagina.php"> Ocultar Evento </a>
                        </li>
                        <li>
                            <a id="historico_evento" href="historico_evento.php"> Histórico de Evento </a>
                        </li>
                        <li>
                            <a id="cadastrar_animal" href="../animal/cadastrar_animal.html"> Cadastrar Animal </a>
                        </li>
                        <li>
                            <a id="atualizar_animal" href="../animal/atualizar_animal_pagina.php"> Atualizar Animal </a>
                        </li>
                        <li>
                            <a id="remover_animal" href="../animal/remover_animal_pagina.php"> Remover Animal </a>
                        </li>
                        <li>
                            <a id="historico_animal" href="../animal/historico_animal.php"> Histórico de Animal </a>
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
                <h2> Ocultar Evento </h2>
                <div class="login">
                    <form action="ocultar_evento.php" method="POST" enctype="multipart/form-data">
                        <br>
                        <h4> Nome: <b style="color: #2A804F"> * </b> </h4>
                        <select type="text" name="nome" id="nome" style="width: 300px; height: 25px;">  
                            <option> Selecione um evento </option>

                        <?php

                            include "../../conexao.php";
                        
                            mysqli_select_db ($connect, $banco) or die ('Erro!');

                            $query = sprintf("SELECT * FROM evento WHERE status = 1");
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

                        <br> <br>
                        <input type="submit" name="ocultar" value="Ocultar" id="ocultar" style="width: 100px; height: 30px; border-radius: 7px;" class="logar">
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