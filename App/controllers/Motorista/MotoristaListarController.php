<?php
require_once (__DIR__ ."/../../models/MotoristaModel.php");

class listarMotorista
{    private $listar;

    public function __construct(){
        $this->listar = new motorista();
        $this->listarTodos();
    }
    // Armazena todos os dados na propriedade $rows
    public function listarTodos(){
        return $this->listar->listarMotoristas();
    }
}

?>