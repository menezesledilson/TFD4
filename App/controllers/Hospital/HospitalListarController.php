<?php
require_once (__DIR__ ."/../../models/HospitalModel.php");
class listarHospital
{    private $listar;

    public function __construct(){
        $this->listar = new Hospital();
        $this->listarTodos();
    }
    public function listarTodos(){
        return $this->listar->listarHospitais();
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