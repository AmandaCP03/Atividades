<?php
    session_start();
    //$frutas=array();
    $lista=array();
    $_GET["fruta"]=strtolower($_GET["fruta"]);
    $_GET["fruta"]=ucfirst($_GET["fruta"]);
    
    if(empty($_GET["fruta"])){
        echo "Preencha o nome da fruta.";
    }else{
        if(empty($_SESSION["frutas"])){
            //$frutas[]=$fruta;
            $_SESSION["frutas"][]=$_GET["fruta"];
            echo"<div></div>
            <div> <ul>";
            for($i=0; $i<sizeof($_SESSION["frutas"]); $i++){
                $lista[$i]=$_SESSION["frutas"][$i];
                echo '<li>'.$lista[$i].'</li>';
            }
            echo"</ul></div>";
        }else if(in_array($_GET["fruta"], $_SESSION["frutas"])){
            echo "<div style='color:red; font-size:20px'>Fruta já existe</div><hr/> 
            <div> <ul>";
            for($i=0; $i<sizeof($_SESSION["frutas"]); $i++){
                $lista[$i]=$_SESSION["frutas"][$i];
                echo '<li>'.$lista[$i].'</li>';
            }
            echo"</ul></div>";
        }else{
            $_SESSION["frutas"][]=$_GET["fruta"];
            echo "<div style='color:green; font-size:20px'>Nova fruta cadastrada!</div><hr/>
            <div><ul>";
            for($i=0; $i<sizeof($_SESSION["frutas"]); $i++){
                $lista[$i]=$_SESSION["frutas"][$i];
                echo'<li>'.$lista[$i].'</li>';
            }
            echo"</ul></div>";
        }
        
    }
?>