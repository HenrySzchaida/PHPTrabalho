<?php

#Arquivo com a declaração da classe Aluno

class Aluno {

    private $idJogo;
    private $nome;
    private $anolancamento;
    private $tipojogo;
    private $curso;
    
    /**
     * Get the value of idJogo
     */
    public function getIdJogo()
    {
        return $this->idJogo;
    }

    /**
     * Set the value of idJogo
     */
    public function setIdJogo($idJogo): self
    {
        $this->idJogo = $idJogo;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of anolancamento
     */
    public function getAnolancamento()
    {
        return $this->anolancamento;
    }

    /**
     * Set the value of anolancamento
     */
    public function setAnolancamento($anolancamento): self
    {
        $this->anolancamento = $anolancamento;

        return $this;
    }

    /**
     * Get the value of tipojogo
     */
    public function getTipojogo()
    {
        return $this->tipojogo;
    }

    /**
     * Set the value of tipojogo
     */
    public function setTipojogo($tipojogo): self
    {
        $this->tipojogo = $tipojogo;

        return $this;
    }

    /**
     * Get the value of curso
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set the value of curso
     */
    public function setCurso($curso): self
    {
        $this->curso = $curso;

        return $this;
    }
}

  

?>