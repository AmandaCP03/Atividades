<?php

    $cpf=$_POST["cpf"];
    validaCPF($cpf);
function validaCPF($cpf) {
 
 // Extrai somente os números
 $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
 $cont =0;
 // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        echo"CPF invalido";
    }
    elseif (preg_match('/(\d)\1{10}/', $cpf)) {
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        echo"CPF invalido";   
    }
    else{
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                $cont=1;
            }
            else{
                $cont=2;
            }
        }
    }

    if($cont==1){
        echo"CPF invalido";   
    }
    else{
        echo"CPF valido";   
    }
}
?>