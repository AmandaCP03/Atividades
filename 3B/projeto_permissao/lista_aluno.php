<?php
include "conf.php";

cabecalho();

// caso o acesso for realizado por professor logado... nao permite o acesso
if($_SESSION["permissao"]=="2"){
    echo "<script>location.href='index.php'</script>";
}


echo "
    <h3>Alunos</h3>
    <div id='msg'></div>
    <table>
        <thead>    
        <tr>
            <th>Prontuário</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data Nascimento</th>
            <th>Sexo</th>
            <th>Ação</th>
        </tr>
        </thead>";

        echo "<tbody id='tbody_aluno'>";
        $select = "SELECT * FROM aluno";
        
        if($_SESSION["permissao"]=="3"){
            $select .= " WHERE prontuario='".$_SESSION["usuario"]."'";
        }

        $select.= " ORDER BY nome";
        $r = mysqli_query($conexao,$select)
            or die("Erro: " . mysqli_error($conexao));                
        $i=0;
        while($l = mysqli_fetch_assoc($r)){
            echo "<tr>
                    <td>".$l["prontuario"]."</td>
                    <td>".$l["nome"]."</td>
                    <td>".$l["email"]."</td>
                    <td>".date("d/m/Y", strtotime($l["data_nascimento"]))."</td>
                    <td>".$l["sexo"]."</td>
                    <td>
                        <button class='btn btn-warning alterar' value='".$l["prontuario"]."' data-toggle='modal' 
                            data-target='#modal'>Alterar</button>";
                    if($_SESSION["permissao"]=="1"){                                 
                        echo "<button class='btn btn-danger remover' value='".$l["prontuario"]."'>Remover</button>";
                    }
              echo "</td>
                  </tr>";
                  $i++;
        }
        if($i==0){
            echo "<tr><td colspan='6'>Não há alunos cadastrados</td></tr>";
        }
        echo "</tbody>";
echo "</table>";
//variaveis $t e $c serão utilizadas no script_remover.php
$titulo = "Alterar Aluno";
$nome_form = "alterar_aluno.php";
include "modal.php";

include "scripts_aluno.php";
rodape();

?>

