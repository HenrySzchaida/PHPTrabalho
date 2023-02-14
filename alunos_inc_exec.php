<?php
#Arquivo para executar a inclusão de um Aluno

include_once("model/aluno.php");
include_once("model/curso.php");
include_once("controller/aluno_controller.php");

//Capturar os valores orindos do formulário
$nome = $_POST["nome_jogo"];
$anolancamento = $_POST['anolancamento_jogo'];
$tipojogo= $_POST['tipojogo_jogo'];
$id_curso = $_POST['curso_aluno'];

//Criar o objeto Aluno
$aluno = new Aluno();
$aluno->setNome($nome);
$aluno->setAnoLancamento($anolancamento);
$aluno->setTipoJogo($tipojogo);

$curso = new Curso($id_curso);
$aluno->setCurso($curso);

//Chamar o controler para salvar o aluno
$alunoCont = new AlunoController();
$alunoCont->salvar($aluno);

//Redireciona para o início
header("location: alunos_listar.php");

?>