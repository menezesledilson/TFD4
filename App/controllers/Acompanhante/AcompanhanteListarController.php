<?php
require_once (__DIR__ ."/../../models/AcompanhanteModel.php");

class AcompanhanteListar 
{
    private $listarAcompanantes;

    public function __construct()
    {
        $this->listarAcompanantes = new Acompanhante();
        $this -> listarTodosAcompanhante();
    }
    // Armazena todos os dados na propriedade $rows
    public function listarTodosAcompanhante()
    {
        return $this->listarAcompanantes->listarAcompanhante();
    }
}

?>




