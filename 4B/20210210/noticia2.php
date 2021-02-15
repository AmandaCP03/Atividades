<html lang='pt-BR'>
    <head>
        <meta charset='utf-8' />
        <script src='js/jquery-3.5.1.min.js'></script>
        <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' />   
        <link href='css/main.css' rel='stylesheet' />
        <script src='js/main.js'></script>
        <script src='js/md5.js'></script>
        <title>Noticia 02</title>
    </head>
    <body>    
        <?php
            session_start();
            if(isset($_SESSION["cpf"])){
                include "cabecalho2.php";
                echo'<input type="text" id="sessao" value="'.$_SESSION["cpf"].'"  hidden>';
            }
            else{
                echo'<input type="text" id="sessao" value=" "  hidden>';
                include "cabecalho.html";
            }
        ?>
        <div class="container conteudo">
            <center><h1>Lavieri: Palmeiras teve Mundial ruim, mas não apaga feitos da temporada</h1></center>
            <p>Poucos dias depois de conquistar a segunda Libertadores de sua história, o Palmeiras fez uma campanha ruim no Mundial de Clubes, perdendo a semifinal para o Tigres e também a decisão do terceiro lugar para o Al Ahly, nos pênaltis, causando muitas críticas ao trabalho de Abel Ferreira e o futebol apresentado pelo time e, em alguns casos, até com certa desvalorização do título sul-americano pelo fato de a final não ter sido um grande jogo.</p>
            <p>No Fim de Papo, live pós-rodada do UOL Esporte — com os jornalistas Isabella Ayami, Menon, Danilo Lavieri e André Rocha —, Lavieri afirma que a atuação do Palmeiras no Mundial foi ruim, a reação do técnico Abel Ferreira em entrevistas após seu time ser criticado também não foi boa, mas não se pode tirar os méritos do título conquistado na Libertadores após 21 anos.</p>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-8 mt-3 offset-lg-2">
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="img/mic.png" alt="Notícia" width="200" height="200">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Veja!</h4>
                                <p class="card-text">COVID-19: Brasil já aplicou ao menos uma dose de vacina em mais de 4,58 milhões, aponta consórcio de veículos de imprensa</p>
                                <br/>
                                <b><a style="color:red; margin-left:70%;" href="noticia1.php">Acessar >></a></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
         include "modal_acesso.html";
            include "rodape.html";
        ?>
    </body>
</html>   