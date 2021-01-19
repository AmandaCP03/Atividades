<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta chartset="UTF-8"/>
    <title> Acessibilidade - Atividade </title>
    <link rel="stylesheet" href="css.css" type="text/css" />
    <link href='bootstrap.min.css' rel='stylesheet' /> 
    <script src="jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function(){
            var size = 1;
            var size = 1;
                $("#grande").click(function(){
                    size += 0.1;
                    $(".container, footer").css("font-size", size+"em");
                });
                $("#normal").click(function(){
                    $(".container, footer").css("font-size", "1em");
                });
                $("#pequena").click(function(){
                    size -= 0.1;
                    $(".container, footer").css("font-size", size+"em");
                });
            });
    </script>
</head>
<body>
    <header>
        <button id="grande" type="button" class="font_size">A+</button>
        <button id="normal" type="button" class="font_size">A</button>
        <button id="pequena" type="button" class="font_size">A-</button>
        <h1>Acessibilidade na WEB</h1>
    </header>
    <div class="container">
        <p>Corpo da pagina</p>
    </div>
    <footer class="fixed-bottom">
        <p>Pagina construida por: Amanda Pereira</p>
    </footer>
</body>
</html>