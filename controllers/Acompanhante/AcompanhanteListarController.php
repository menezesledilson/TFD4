<?php
require_once (__DIR__ ."/../../models/AcompanhanteModel.php");


class listarAcompanhante{
    private $listar;
    public function __construct(){
        $this->listar = new Acompanhante();
        $this -> listarTodos();
    }
    //listar todos os dados
    public function listarTodos(){
        return $this -> listar->listarAcompanhantes();
    }


}



