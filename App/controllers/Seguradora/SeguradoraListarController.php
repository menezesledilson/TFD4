<?php
require_once (__DIR__ ."/../../models/SeguradoraModel.php");
class listarSeguradora{
    private $listar;
    public function __construct(){
        $this->listar = new Seguradora();
        $this -> listarTodos();
    }
    //listar todos os dados
    public function listarTodos(){
        return $this -> listar->listarSeguradora();
    }

}