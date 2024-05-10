<?php
require_once (__DIR__ ."/../../models/ViagemModel.php");
class listarViagem
{
    private $listar;

    public function __construct()
    {
        $this->listar = new Viagem();

    }

    // Armazena todos os dados na propriedade $rows
    public function listarTodos()
    {
        return $this->listar->listarViagens();
    }
}
?>




