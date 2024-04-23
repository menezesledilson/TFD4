<?php
require_once ("../../Model/MotoristaModel.php");

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