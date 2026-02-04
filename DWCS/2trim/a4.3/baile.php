<?php 
class Baile{
    public $nome;
    public $idadeMinima;

    public function __construct(string $nome, int $idadeMinima = 8)
    {
        $this->nome = $nome;
        $this->idadeMinima = $idadeMinima;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Get the value of idadeMinima
     */
    public function getIdadeMinima()
    {
        return $this->idadeMinima;
    }
}