<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <script src='js/jquery-3.5.1.min.js'></script>
    <script src='js/moment.js'></script>
    <script src='js/MD5.js'></script>
    <script>
    
    $(function(){
        $("#x").html($.md5("12345"));
    });

    </script>
</head>
<body>
    <div id="x"></div>
</body>
</html>