<!DOCTYPE html>
    <html lang='pt-BR'>
        <head>
            <meta charset='UTF-8' />
            <title>Atividade - 12/01</title>
            <link href='css/bootstrap.min.css' rel='stylesheet' /> 
            <script src='js/jquery-3.5.1.min.js'></script> 
            <script src='js/bootstrap.min.js'></script>
            <script src="js/md5.js"></script>
            <script>
                $(function(){
                    $(".autenticar").click(function(){
                        var senha= $("input[name='senha']").val();
                        senha = $.md5(senha);
                        $("input[name='senha_login']").val(senha);
                    });
                });
            </script>
            <script>
                var hora;
                var muda = 1;
                var tempo = new Number();
                tempo = <?php echo ini_set("session.gc_maxlifetime", 60); session_set_cookie_params(60); ?>;
                function iniciaLogout(){
                    if((tempo - 1) >= 0){
                        var min = parseInt(tempo/60);
                        var seg = tempo%60;
                        if(min < 10){
                            min = '0'+min;
                            min = min.substr(0, 2);
                        }
                        if(seg <=9){
                            seg = "0"+seg;
                        }
                        hora = min + ':' + seg;
                        $("#cronometro").html(hora);
                        setTimeout('iniciaLogout()',10);
                        if((tempo - 1) <= 25){
                            if(muda == 1){
                                $("#cronometro").css('color', 'red').css('font-weight', 'bold');
                                muda = 0;
                            }else{
                                $("#cronometro").css('color', 'white').css('font-weight', 'normal');
                                muda = 1;
                            }
                        }
                        tempo--;
                    }else{
                        $("#cronometro").html('00:00');
                        window.location.href = "logout.php";
                    }
                }
            </script>
        </head>
        <body>
            <div class="container">
            <?php
            include "modal.php";
            session_start();

            if(!isset($_SESSION["usuario"])){
                
                echo "<div><h4 class='display-4'>Bem vindo!</b></h4></div>";
                echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_login">Login</button>';
            
            }else{
                ?>
                    <script language="javascript" type="text/javascript">
                        iniciaLogout();
                    </script>
                <?php
                
                echo'<p id="cronometro"></p>';
                echo '<div>
                    <h5>Bem vindo, <b>'.$_SESSION['email'].'!</b></h5>
                    <p>CPF:'.$_SESSION["usuario"].'</p>
                    <p>Você está logado como '.$_SESSION["tipo"].' - Nível 0'.$_SESSION["permissao"].'</p>
                    </div>';
                echo '<button type="button" class="btn btn-primary" onclick="location.href=\'logout.php\';">Sair</button>';
            }
                
            ?>
            </div>
        </body>
    </html>
