<?php
require_once ("../../Model/HospitalModel.php");

class listarHospital
{    private $listar;

    public function __construct(){
        $this->listar = new Hospital();
        $this->listarTodos();
    }
    public function listarTodos(){
        return $this->listar->listarHospitais();
    }
 }

?>