<?php

do{
    $prontuario = (string)mt_rand(0,9);
    $prontuario.= (string)mt_rand(0,9);
    $prontuario.= (string)mt_rand(0,9);
    $prontuario.= (string)mt_rand(0,9);
    $prontuario.= (string)mt_rand(0,9);
    $prontuario.= (string)mt_rand(0,9);
    $prontuario.= (string)mt_rand(0,9);
    $prontuario.= (string)mt_rand(0,9);

    $select = "SELECT * FROM aluno WHERE prontuario='$prontuario'";
    $r1 = mysqli_query($conexao,$select)
        or die(mysqli_error($conexao));
    $tem_aluno=mysqli_num_rows($r1);
        
    $select = "SELECT * FROM professor WHERE prontuario='$prontuario'";
    $r2 = mysqli_query($conexao,$select)
        or die(mysqli_error($conexao));
    $tem_professor=mysqli_num_rows($r2);    

}while($tem_aluno || $tem_professor);        

?>