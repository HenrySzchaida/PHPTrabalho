<?php
#Classe auxiliar para criar componentes HTML de Aluno

class AlunoHTML {

    public static function desenhaTabela($alunos) {
        echo "<table class='table table-striped table-bordered'>";
        
        echo "<thead>";
        echo "<th scope='col'>Nome</th>";
        echo "<th scope='col'>AnoLancamento</th>";
        echo "<th scope='col'>TipoJogo</th>";
        echo "<th scope='col'>Distribuidora</th>";
        echo "<th scope='col'>Alterar</th>";
        echo "<th scope='col'>Excluir</th>";
        echo "<th scope='col'>Matricular</th>";
        echo "</thead>";
        
        echo "<tbody>";
        foreach ($alunos as $aluno):
            echo "<tr>";
            echo "<td>". $aluno->getNome() ."</td>";
            echo "<td>". $aluno->getAnoLancamento() ."</td>";
            //echo "<td>". $aluno->getEstrangeiro() ."</td>";
            echo "<td>". $aluno->getTipoJogo() ."</td>";
            echo "<td>". $aluno->getCurso()->getNome() ."</td>";
            
            //Editar
            echo "<td>". 
                "<a href='alunos_alt.php?id=". $aluno->getIdJogo() . "'>".
                "<img src='img/btn_editar.png'>" . "</a>".
            "</td>";
            
            //Excluir
            echo "<td>". 
                "<a href='alunos_del_exec.php?id=". $aluno->getIdJogo() . 
                "' onclick='return confirm(\"Confirma a exclusão do aluno?\");'".
                ">".
                "<img src='img/btn_excluir.png'>" . "</a>".
            "</td>";

            //Matricular
            echo "<td>". 
                "<a href='matriculas.php?id=". $aluno->getIdJogo() . "'>".
                "<img src='img/btn_matricular.png'>" . "</a>".
            "</td>";
            
            echo "</tr>";
        endforeach;
        echo "</tbody>";

        echo "</table>";
    }

}
?>