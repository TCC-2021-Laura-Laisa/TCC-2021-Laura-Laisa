<html>
    <head>
        <meta charset="UTF-8">
        <link rel="sortcut icon" href="../imagens/icone_pata.png" type="image/gif"/>
        <title>APAF</title>
        <link rel="stylesheet" type="text/css" href="../estilo.css">
    </head>
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
                            <a id="home" href="home_apaf.php"> Home </a>
                        </li>
                        <li>
                            <a id="animais" href="animal/animais_apaf.php"> Animais </a>
                        </li>
                        <li>
                            <a id="cadastrar_evento" href="evento/cadastrar_evento.html"> Cadastrar Evento </a>
                        </li>
                        <li>
                            <a id="atualizar_evento" href="evento/atualizar_evento_pagina.php"> Atualizar Evento </a>
                        </li>
                        <li>
                            <a id="ocultar_evento" href="evento/ocultar_evento_pagina.php"> Ocultar Evento </a>
                        </li>
                        <li>
                            <a id="historico_evento" href="evento/historico_evento.php"> Histórico de Evento </a>
                        </li>
                        <li>
                            <a id="cadastrar_animal" href="animal/cadastrar_animal.html"> Cadastrar Animal </a>
                        </li>
                        <li>
                            <a id="atualizar_animal" href="animal/atualizar_animal_pagina.php"> Atualizar Animal </a>
                        </li>
                        <li>
                            <a id="remover_animal" href="animal/remover_animal_pagina.php"> Remover Animal </a>
                        </li>
                        <li>
                            <a id="historico_animal" href="animal/historico_animal.php"> Histórico de Animal </a>
                        </li>
                        <li>
                            <a id="historico_adocao" href="historico_adocao.php"> Histórico de Adoções </a>
                        </li>
                        <li>
                            <a id="adotantes" href="adotantes.php"> Adotantes </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="coluna_direita">
            <div class="descricao">
                <h2> APAF - Associação Protetora de Animais de Formiga-MG </h2>
                <p>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; A Associação Protetora de Animais de Formiga-MG (APAF) é uma associação cujo principal objetivo é cuidar e proteger animais de rua e semi-domiciliados. Atitudes como, castração, encaminhamento para lares provisórios, gestão de adoção e incentivo à denúncias de maus-tratos e abandono, são realizadas.
                </p>
                <p>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Não possuindo fins lucrativos, sede fixa ou telefone de contato, a APAF funciona através de voluntários e doações. Vale ressaltar que ela não é responsável pelos lares ou castrações, mas sim por encaminharem às clínicas e aos possíveis donos. Além disso, são promovidos eventos sociais, como feiras de adoções, manifestações, campanhas, palestras e muito mais!
                </p>
                <a href="https://apaformiga.wixsite.com/associacao"> Visite o site! </a> <br> <br> <br>
            </div>
            <div>
                <h2> Doações </h2>
                <p>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Deseja contribuir com a ONG? A Associação Protetora de Animais de Formiga (APAF) aceita doações de rações para cães e gatos e tratamentos clínicos como vacinação, castração ou outros procedimentos. Você pode manifestar seu interesse em ajudar através das redes sociais da APAF.
                </p>
                &nbsp; &nbsp; &nbsp;
                <a href="https://pt-br.facebook.com/pages/category/Non-Governmental-Organization--NGO-/Apaf-Formiga-480874972288907/">
                  <img src="../imagens/icone_facebook.png" width="30" height="30">
                </a>
                &nbsp; &nbsp;
                <a href="https://www.instagram.com/apaformiga/?hl=pt-br">
                    <img src="../imagens/icone_instagram.png" width="30" height="30">
                </a>
                <br> <br> <br>
            </div>
            <div id="eventos">
                <h2> Eventos </h2>
                    
                    <?php 

                       include "../conexao.php";
                        
                        mysqli_select_db ($connect, $banco) or die ('Erro!');

                        $status = '1';
                        $query = sprintf("SELECT nome, descricao, imagem FROM evento WHERE `status` = '$status'");
                        $dados = mysqli_query( $connect, $query) or die('erro ao executar a query');
                        $linha = mysqli_fetch_assoc($dados);
                        $total = mysqli_num_rows($dados);

                     
                   if($total > 0 ) {
        // inicia o loop que vai mostrar todos os dados
        do {
?>
					<ul>
					    <li>
					        <p>  
					            <img src="../imagens/<?=$linha['imagem']?>" width="200" height="200" >
					            <h3> <?=$linha['nome']?> </h3> <br> <br>
					            <?=$linha['descricao']?> <br> <br>  
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