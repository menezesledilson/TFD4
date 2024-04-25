<?php
require_once("../../Model/SituacaoModel.php");
class listarSituacao
{    private $listar;
    public function __construct()
    {
        $this->listar = new Situacao();
        $this->listarTodos();
    }

    // Armazena todos os dados na propriedade $rows
    public function listarTodos()
    {
        return $this->listar->listarSituacoes();
    }
}





