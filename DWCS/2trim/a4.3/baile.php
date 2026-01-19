<?php 
class Baile{
    public $nome;
    public $idadeMinima;

    public function __construct(string $nome, int $idadeMinima = 8)
    {
        $this->nome = $nome;
        $this->idadeMinima = $idadeMinima;
    }
}