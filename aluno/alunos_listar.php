<?php
//Inclui a página que verifica se o usuário está logado
include_once(__DIR__ . "/../login_verifica.php");

include_once(__DIR__ . "/../util/conexao.php");
include_once(__DIR__ . "/../controller/aluno_controller.php");
include_once(__DIR__ . "/../view/aluno_html.php");

//Teste de conexão
//$connection = conectar_db();
//print_r($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once(__DIR__ . "/../bootstrap/head.php"); ?>
</head>

<body>
    <?php include_once(__DIR__ . "/../bootstrap/menu.php"); ?>

    <h3 class="text-center">ALUNOS</h3>
   
    <div style="margin: 40px 10px 0px 10px;">
        <a class="btn btn-outline-success" href="alunos_inc.php">Incluir Novo Aluno</a><br><br><br>
    
        <p style="font-weight: bold;">RELAÇÃO DOS ALUNOS CADASTRADOS</p>

        <?php
            $alunoCont = new AlunoController();
            $alunos = $alunoCont->listar(); 
            
            AlunoHTML::desenhaTabela($alunos);
        ?>
    </div>    

    <?php include_once(__DIR__ . "/../bootstrap/footer.php"); ?>
</body>

</html>
