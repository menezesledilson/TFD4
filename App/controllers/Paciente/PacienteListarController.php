<?php
require_once (__DIR__ ."/../../models/PacienteModel.php");
class listarPaciente
{
    private $listar;

    public function __construct()
    {
        $this->listar = new Paciente();

    }

    // Armazena todos os dados na propriedade $rows
    public function listarTodos()
    {
        return $this->listar->listarPacientes();
    }

    public function listarTodosPorId($id)
    {
        return $this->listar->listarPacientePorId($id);
    }

    /*
    public function contarTotalPacientes()
    {
        $pacientes = $this->listar->listarPacientes();
        return count($pacientes);
    }
    */
}

?>




