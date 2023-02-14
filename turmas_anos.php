<?php
#Arquivo para retornar os anos nas turmas

include_once("controller/turma_controller.php");

$turmaCont = new TurmaController();
$anos = $turmaCont->listarAnosTurmas();

//Retorna a resposta em forma JSON
echo json_encode($anos, JSON_UNESCAPED_UNICODE);

