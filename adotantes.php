<html>
    <head>
        <meta charset="UTF-8">
        <link rel="sortcut icon" href="imagens/icone_pata.png" type="image/gif"/>
        <title>APAF</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <!-- Classe para marcar a página atual -->
    <body class="">
    <div class="topo">
        <div class="cabecalho">
            <img src="imagens/logo_esquerda.jpeg">
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
                            <a id="home" href="home_apaf.php"> Home </a>
                        </li>
                        <li>
                            <a id="animais" href="animais_apaf.php"> Animais </a>
                        </li>
                        <li>
                            <a id="cadastrar_evento" href="cadastrar_evento.html"> Cadastrar Evento </a>
                        </li>
                        <li>
                            <a id="atualizar_evento" href="atualizar_evento.html"> Atualizar Evento </a>
                        </li>
                         <li>
                            <a id="remover_evento" href="remover_evento.html"> Remover Evento </a>
                        </li>
                        <li>
                            <a id="cadastrar_animal" href="cadastrar_animal.html"> Cadastrar Animal </a>
                        </li>
                        <li>
                            <a id="atualizar_animal" href="atualizar_animal.html"> Atualizar Animal </a>
                        </li>
                        <li>
                            <a id="historico_animal" href="historico_animal.php"> Histórico de Animal </a>
                        </li>
                        <li>
                            <a id="adotantes" href="adotantes.html"> Adotantes </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="coluna_direita">
            <div id="animal">
                <h2> Possíveis Adotantes </h2>

                <?php 

                        include "conexao.php";
                        
                        mysqli_select_db ($connect, $banco) or die ('Erro!');

                        $query = sprintf("SELECT `nome`, `email`, `contato`, `cpf`, `rg`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `nome_animal`, `data_adocao` FROM `adocao`");
                        $dados = mysqli_query( $connect, $query) or die('Erro!');

                        $linha = mysqli_fetch_assoc($dados);
                        $total = mysqli_num_rows($dados);
                      
                        if($total > 0 ) {
                            
                            do {
                ?>

                    <ul>
                        <li>
                            <p>  
                               <h3> Adotante: </h3> <?=$linha['nome']?> <br> <br>
                               <h3> E-mail: </h3> <?=$linha['email']?> <br> <br> 
                               <h3> Contato: </h3> <?=$linha['contato']?> <br> <br> 
                               <h3> CPF: </h3> <?=$linha['cpf']?> <br> <br> 
                               <h3> Identidade: </h3> <?=$linha['rg']?> <br> <br> 
                               <h3> Cidade: </h3> <?=$linha['cidade']?> <br> <br> 
                               <h3> Bairro: </h3> <?=$linha['bairro']?> <br> <br> 
                               <h3> Rua: </h3> <?=$linha['rua']?> <br> <br> 
                               <h3> Número: </h3> <?=$linha['numero']?> <br> <br> 
                               <h3> Complemento: </h3> <?=$linha['complemento']?> <br> <br>
                               <h3> Animal: </h3> <?=$linha['nome_animal']?> <br> <br> 
                               <h3> Data: </h3> <?=$linha['data_adocao']?> <br> <br> 
                            </p> 
                        </li>
                    </ul>

                    <?php }

                while($linha = mysqli_fetch_assoc($dados)); 

            } 

                    
            ?>

            
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