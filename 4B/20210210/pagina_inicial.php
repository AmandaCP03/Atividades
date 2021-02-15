<html lang='pt-BR'>
    <head>
       <?php include "head.php" ?>
        <title>Pagina</title>
    </head>
    <body class="body_login">   
        <nav class="navbar fixed-top">
                <a class="navbar-brand" style="color:white" href="index.php">Mandália</a>  
                <a class="navbar-brand nav-link active" style="color:white" href="noticia1.php">Noticia1</a>                        
                <a class="navbar-brand nav-link active" style="color:white" href="noticia2.php">Noticia2</a>                                              
                <a type="button" class="cad" data-toggle="modal" data-target="#modal_cad">
                Cadastre-se
                </a>
        </nav>
        <header class="" style="margin-top: 10%;margin-left: 30%;">
            <div class="container-fluid">
            <?php 
                if(isset($_GET["entrar"])){
                    echo"<div class='alert alert-success col-6 text-center'role='alert'>Faça seu login para entrar</div>";
                }
                echo'<input type="text" id="sessao" value="pagina_errada"  hidden>';
            ?>
                <form id="autenticar" action="autenticacao.php" method="post"class="form_login col-6">
                    <h1>Login</h1>
                    <div class="form-group p-3" >
                        <input type="text" class="form-control" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="form-group p-3">
                        <input type="password" class="form-control" name="senha" placeholder="Senha"  required="required"/>
                    </div>
                    <div>
                    <button type="submit" name="sbmeter" class="btn btn-primary m-3">Entrar</button>
                    </div>
                    
                </form>
            </div>
        </header>
        <div class="modal fade" id="modal_cad" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                    <button class="close" data-dismiss="modal">
                        <i class="far fa-times-circle"></i>
                    </button>
                </div>
                <div class="modal-body">
                <div class="msg"></div>
                <form  class="d-flex justify-content-center">
                    <div class="form-row  offset-md-6 justify-content-md-center ">
                        <div class="form-group col-md-12">
                            <input type="cpf" name="cpf"  placeholder = "CPF..." id="cpf" class="form-control " required="required">
                        </div>
                        <div class="form-group col-md-12">
                                <input type="text" name="nome_cad" placeholder = "Nome ..." class="form-control" required="required">
                        </div>
                        <div class="form-group col-md-12">
                                <input type="email" name="email_cad" placeholder = "E-mail..." class="form-control" required="required">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" name="senha_cad"   placeholder = "Senha..." class="form-control" required="required">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" name="confirmar_senha"   placeholder = "Confirme sua senha..." class="form-control" required="required">
                        </div>
                        <div hidden>
                            <input type="date" name="data_cad" value="<?php echo date('Y-m-d');?>" class="form-control"  >
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary cad_assinante">Cadastrar</button>
                </div>
                </div>
            </div>
        </div>
        <!--<script type="text/javascript">
            $("#cpf").mask("000.000.000-00");
        </script>-->
        <script type="text/javascript">
            $(document).ready(function(){
                $("#cpf").mask("999.999.999-99");
            });
        </script>
    </body>
</html>   