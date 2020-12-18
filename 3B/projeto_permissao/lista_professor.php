<?php
include "conf.php";
cabecalho();

// caso o acesso for realizado por aluno logado....nao permite o acesso
if($_SESSION["permissao"]=="3"){
    echo "<script>location.href='index.php'</script>";
}

$select = "SELECT * FROM professor ";

if($_SESSION["permissao"]=="2"){
    $select .= " WHERE prontuario='".$_SESSION["usuario"]."'";
}

$select.=" ORDER BY nome";
$r = mysqli_query($conexao,$select)
    or die("Erro: " . mysqli_error($conexao));    

echo "
    <h3>Professores</h3>
    <div id='msg'></div>
    <table>
        <thead>    
        <tr>
            <th>Prontuário</th>
            <th>Nome</th>
            <th>Email</th>            
            <th>Formação</th>
            <th>Ação</th>
        </tr>
        </thead>";

        echo "<tbody id='tbody_professor'>";
        $i=0;
        while($l = mysqli_fetch_assoc($r)){
            echo "<tr>
                    <td>".$l["prontuario"]."</td>
                    <td>".$l["nome"]."</td>
                    <td>".$l["email"]."</td>
                    <td>".$l["formacao"]."</td>
                    <td>
                        <button class='btn btn-warning alterar' value='".$l["prontuario"]."' data-toggle='modal' 
                            data-target='#modal'>Alterar</button>"; 

                    if($_SESSION["permissao"]=="1"){                                 
                        echo "<button class='btn btn-danger remover' value='".$l["prontuario"]."'>Remover</button>";
                    }
                    
               echo"</td>
                  </tr>";
                  $i++;
        }
        if($i==0){
            echo "<tr><td colspan='5'>Não há professores cadastrados</td></tr>";
        }
        echo "</tbody>";
echo "</table>";
//variaveis $t e $c serão utilizadas no script_remover.php
$titulo = "Alterar Professor";
$nome_form = "alterar_professor.php";
include "modal.php";

include "scripts_professor.php";
rodape();

?>

