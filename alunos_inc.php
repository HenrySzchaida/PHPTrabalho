<?php
#Página com o formulário para incluir um aluno

//Inclui a página que verifica se o usuário está logado
include_once("login_verifica.php");

include_once("controller/curso_controller.php");
include_once("view/curso_html.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("bootstrap/head.php"); ?>
</head>
<body>
    <?php include_once("bootstrap/menu.php"); ?>

    <h3 class="text-center">INSERIR JOGO</h3>

    <div style="max-width: 50%; margin-left: 10px;">
        <form name="frmCadastroAlunos" method="POST" action="alunos_inc_exec.php" onsubmit="return validarDadosForm();">
            <div class="form-group">
                <label for="txtNome">Nome:</label>
                <input class="form-control" type="text" id="txtNome" name="nome_jogo" 
                    size="45" maxlength="70" placeholder="Informe o nome" />
            </div>
            <div class="form-group">
                <label for="txtanolancamento">Ano Lancamento:</label>
                <input class="form-control" type="date" id="txtanolancamento" name="anolancamento_jogo" 
                    style="width: 100px;"/>    
            </div>
            <div class="form-group">
                <label for="somEst">Tipo Jogo:</label>
                <input type="text" id="somEst" name="tipojogo_jogo" class="form-control">
                
            </div>     
            <div class="form-group">
                <label for="somCurso">Distribuidora:</label>
                <?php
                    $cursoCont = new CursoController();
                    $cursos = $cursoCont->listar();

                    CursoHTML::desenhaSelect($cursos, "curso_aluno", "somCurso");
                ?>
            </div>

            <button type="submit" class="btn btn-success">Gravar</button>
            <button type="reset" class="btn btn-danger">Limpar</button>
        </form>

        <div id="divErro" class="alert alert-danger" style="display: none; margin-top: 20px;" />

        <br><br>
        <a class="btn btn-outline-secondary" href="alunos_listar.php">Voltar</a>
    </div>

    <?php include_once("bootstrap/footer.php"); ?>

    <script src="js/alunos.js"></script>
</body>
</html>