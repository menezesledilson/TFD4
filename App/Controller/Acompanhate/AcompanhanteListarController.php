<?php
require_once("../../Model/AcompanhanteModel.php");
class AcompanhanteListarController
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




