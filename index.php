<?php
    //Inclui a página que verifica se o usuário está logado
    include_once("login_verifica.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("bootstrap/head.php"); ?>
</head>

<body>
    <?php include_once("bootstrap/menu.php"); ?>

    <h1 class="text-center">SISTEMA ACADÊMICO</h1>
   
    <!-- Cards -->
    <div class="row" style="margin: 20px;">
        <div class="col-6">
            <div class="card text-center" style="width: 18rem;">
                <img class="mx-auto d-block" src="img/card_alunos.png" alt="Alunos"
                    style="max-width: 200px; height: auto;">
                <div class="card-body">
                    <h5 class="card-title">JOGOS</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="alunos_listar.php" class="card-link">Listagem de JOGOS</a></li>
                    <li class="list-group-item"><a href="alunos_inc.php" class="card-link">Inserir JOGOS</a></li>
                </ul>
            </div>
        </div>
    </div>

    <?php include_once("bootstrap/footer.php"); ?>
</body>

</html>