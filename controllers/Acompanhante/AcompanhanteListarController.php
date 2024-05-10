<?php
require_once (__DIR__ ."/../../models/AcompanhanteModel.php");

class listarAcompanhante
{
    private $listar;

    public function __construct()
    {
        $this->listar = new Acompanhante();
        $this -> listarTodos();
    }
    // Armazena todos os dados na propriedade $rows
    public function listarTodos()
    {
        return $this->listar->listarAcompanhante();
    }
}

?>




