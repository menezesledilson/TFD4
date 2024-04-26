<?php
require_once ("../../Model/DiariaModel.php");

class listarDiaria{
    private $listar;
    public function __construct(){
        $this->listar = new Diaria();
        $this -> listarTodos();
    }
    //listar todos os dados
    public function listarTodos(){
        return $this -> listar->listarDiaria();
    }
}