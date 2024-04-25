<?php
require_once ("../../Model/PacienteModel.php");

class listarPaciente
{
    private $listar;

    public function __construct(){
        $this->listar = new Paciente();
        $this->listarTodos();
    }
    // Armazena todos os dados na propriedade $rows
    public function listarTodos(){
        return $this->listar->listarPacientes();
    }
}

?>




