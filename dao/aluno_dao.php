<?php
#Classe DAO para o model de Aluno

include_once(__DIR__ . "/../util/conexao.php");
include_once(__DIR__ . "/../model/curso.php");
include_once(__DIR__ . "/../model/aluno.php");

class AlunoDAO {

    private const SQL_ALUNO = "SELECT a.*, c.nome AS nome_curso FROM alunos a". 
                              " JOIN cursos c ON c.id_curso = a.id_curso";

    private function mapAlunos($resultSql) {
        $alunos = array();
        foreach ($resultSql as $reg):
            $aluno = new Aluno();
            $aluno->setIdJogo($reg['id_jogo']);
            $aluno->setNome($reg['nome']);
            $aluno->setAnoLancamento($reg['anolancamento']);
            $aluno->setTipoJogo($reg['tipojogo']);

            $curso = new Curso($reg['id_curso'], $reg['nome_curso']);
            $aluno->setCurso($curso);
            array_push($alunos, $aluno);
        endforeach;

        return $alunos;
    }

    public function list() {
        $conn = conectar_db();

        $sql = AlunoDAO::SQL_ALUNO . 
                " ORDER BY a.nome";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapAlunos($result);
    }

    public function findById($idJogo) {
        $conn = conectar_db();

        $sql = AlunoDAO::SQL_ALUNO . 
                " WHERE a.id_jogo = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$idJogo]);
        $result = $stmt->fetchAll();

        //Criar o objeto Aluno
        $alunos = $this->mapAlunos($result);

        if(count($alunos) == 1)
            return $alunos[0];
        elseif(count($alunos) == 0)
            return null;

        die("AlunoDAO.findById - Erro: mais de um aluno".
                " encontrado para o ID ".$idJogo);
    }

    public function save(Aluno $aluno) {
        $conn = conectar_db();

        $sql = "INSERT INTO alunos (nome, anolancamento, tipojogo, id_curso)".
            " VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$aluno->getNome(), $aluno->getAnoLancamento(), 
                        $aluno->getTipoJogo(), $aluno->getCurso()->getIdCurso()]);
    }

    public function update(Aluno $aluno) {
        $conn = conectar_db();

        $sql = "UPDATE alunos SET nome = ?, anolancamento = ?,". 
            " tipojogo = ?, id_curso = ?".
            " WHERE id_jogo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$aluno->getNome(), $aluno->getAnoLancamento(), 
                        $aluno->getTipoJogo(), $aluno->getCurso()->getIdCurso(),
                        $aluno->getIdJogo()]);
    }

    public function delete(Aluno $aluno) {
        $conn = conectar_db();

        $sql = "DELETE FROM alunos WHERE id_jogo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$aluno->getIdJogo()]);
    }
    
}

?>