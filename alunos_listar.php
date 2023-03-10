<?php
//Inclui a página que verifica se o usuário está logado
include_once("login_verifica.php");

include_once("util/conexao.php");
include_once("controller/aluno_controller.php");
include_once("view/aluno_html.php");

//Teste de conexão
//$connection = conectar_db();
//print_r($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("bootstrap/head.php"); ?>
</head>

<body>
    <?php include_once("bootstrap/menu.php"); ?>

    <h3 class="text-center">JOGOS</h3>
   
    <div style="margin: 40px 10px 0px 10px;">
        <a class="btn btn-outline-success" href="alunos_inc.php">Incluir Novo JOGO</a><br><br><br>
    
        <p style="font-weight: bold;">RELAÇÃO DOS JOGOS CADASTRADOS</p>

        <?php
            $alunoCont = new AlunoController();
            $alunos = $alunoCont->listar(); 
            
            AlunoHTML::desenhaTabela($alunos);
        ?>
    </div>    

    <?php include_once("bootstrap/footer.php"); ?>
</body>

</html>
